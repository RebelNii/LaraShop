<?php

namespace App\Http\Controllers;

use App\Mail\CheckOutMail;
use App\Models\Activity;
use App\Models\Cart;
use App\Models\CheckOut;
use App\Models\Products;
use App\View\Components\checkout as ComponentsCheckout;
use Cartalyst\Stripe\Api\Checkout as ApiCheckout;
use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Paystack;


class CheckOutController extends Controller
{
    //
    public function index(Request $request)
    {
        //dd($request);
        $firstName = $request->first_name;
        $lastName = $request->last_name;
        $address = $request->address;
        $city = $request->city;
        $region = $request->region;
        $postal = $request->postal;
        $phone = $request->phone;
        $email = $request->email;
        $cc = $request->cc;
        $cvv = $request->cvv;
        $month = $request->month;
        $year = $request->year;
        $country = $request->country;

        $stripe = Stripe::make('sk_test_51KqztJE0lh59A6dkMMlloiOEfIt8SZc6E3pBUKc4d9mS7H0yHZd0KCRnojX7p0E1QUSJAxK8Z2nU3WeoAwDCE9DC001tZseoOX');

        //get token
        $token = $stripe->tokens()->create([
            'card' => [
                'number' => $cc,
                'exp_month' => $month,
                'exp_year' => $year,
                'cvc' => $cvv
            ]
        ]);

        //dd($token);
        if (!$token['id']) {
            session()->flush('message', 'Failed to connect to stripe');
            return;
        }

        $customer = $stripe->customers()->create([
            'name' => $firstName . ' ' . $lastName,
            'email' => $email,
            'phone' => $phone,
            'address' => [
                'line1' => $address,
                'postal_code' => $postal,
                'city' => $city,
                'state' => $region,
                'country' => $country
            ],
            'shipping' => [
                'name' => $firstName . ' ' . $lastName,
                'address' => [
                    'line1' => $address,
                    'postal_code' => $postal,
                    'city' => $city,
                    'state' => $region,
                    'country' => $country
                ],
            ],
            'source' => $token['id']
        ]);

        $total = auth()->user()->cart->sum('price');

        $charge = $stripe->charges()->create([
            'customer' => $customer['id'],
            'currency' => 'USD',
            'amount' => $total,
            'description' => 'Order'
        ]);

        //delete item from cart and move order details in checkout table in database

        //get users cart
        $user = auth()->id();
        $orders = Cart::where('user_id', $user)->get();

        $start = date("Y") . "/" . date("m") . "/" . date("d");
        $numOne = rand(1, 10);
        $numTwo = rand(10, 100);
        $numThree = rand(1000, 9999);

        foreach ($orders as $order) {
            $ORDERED = CheckOut::create(
                [
                    'client_name' => $firstName . ' ' . $lastName,
                    'address' => json_encode([
                        'lin1' => $address,
                        'city' => $city,
                        'Region' => $region,
                        'postal' => $postal
                    ]),
                    'phone' => $phone,
                    'status' => 'paid',
                    'card_number' => $cc,
                    'subTotal' => $total,
                    'product_id' => $order['product_id'],
                    'user_id' => $order['user_id'],
                    'order_price' => $order['price'],
                    'order_quantity' => $order['quantity'],
                    'order_id' => $start . '/' . $numOne . '/' . $numTwo . '/' . $numThree,
                    'cart_id' => $order['id']
                ]
            );

            if (isset($ORDERED)) {
                Cart::where('user_id', $user)->delete();

                Activity::create([
                    'user_id' => auth()->id(),
                    'activity' => auth()->user()->first_name . " " . 'checked out cart items'
                ]);

                Mail::to(auth()->user()->email)->send(new CheckOutMail);
            }
        }

        return redirect('/')->with('message', 'Payment Successful');
    }

    public function callback()
    {
        $response = json_decode($this->initializePayment(request('reference')));
        //dd($response);
        return view('products.index', [
            'products' => Products::latest()->where(function($query){
                if($search = request('search')){
                    $query->where('product_name', 'LIKE', "%{$search}%");
                    $query->where('brand', 'LIKE', "%{$search}%");
                    $query->where('category', 'LIKE', "%{$search}%");
                }
            })->paginate(8)
        ]);
    }


    public function makePayment(Request $request)
    {
        //dd($request);
        $id = auth()->id();
        $solds = Cart::where('user_id',$id)->get();
        $fName = $request->first_name;
        $lName = $request->last_name;
        $amount = auth()->user()->cart->sum('price');
        $mail = $request->email;
        $add = $request->address;
        $cit = $request->city;
        $reg = $request->region;
        $zip = $request->postal;
        $tel = $request->phone;
        $start = date("Y") . "/" . date("m") . "/" . date("d");
        $numOne = rand(1, 10);
        $numTwo = rand(10, 100);
        $numThree = rand(1000, 9999);
        $data = [
            'email' => $mail,
            'amount' => $amount * 100,
            'first_name' => $fName,
            'last_name' => $lName,
            'phone' => $tel,
            'callback_url' => route('callback')
        ];

        $url = 'https://api.paystack.co/transaction/initialize';

        $field = http_build_query($data);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $field);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . env("PAYSTACK_SECRET_KEY"),
            'Cache-Control: no-cache'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);
        $final = json_decode($result);
        if ($final->status) {
            foreach($solds as $sold){
                $orders = Checkout::create([
                    'client_name' => $fName . ' ' . $lName,
                    'user_id' => $id,
                    'product_id' => $sold['product_id'],
                    'address' => json_encode([
                        'lin1' => $add,
                        'city' => $cit,
                        'Region' => $reg,
                        'postal' => $zip
                    ]),
                    'phone' => $tel,
                    'status' => 'pending',
                    'card_number' => 'mobile money',
                    'subTotal' => $amount,
                    'product_id' => $sold['product_id'],
                    'user_id' => $sold['user_id'],
                    'order_price' => $sold['price'],
                    'order_quantity' => $sold['quantity'],
                    'order_id' => $start . '/' . $numOne . '/' . $numTwo . '/' . $numThree,
                    'cart_id' => $sold['id']
                ]);
            }
            if(isset($orders)){
                Cart::where('user_id',$id)->delete();
                Activity::create([
                    'user_id' => auth()->id(),
                    'activity' => auth()->user()->first_name . " " . 'checked out cart items'
                ]);
                Mail::to(auth()->user()->email)->send(new CheckOutMail);
            }
            return redirect($final->data->authorization_url)->with('message', "payment successful");
        } else {
            //dd($final);
            return redirect('/cart')->with('message', $final->message);
        }
    }

    public function initializePayment($reference)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . env("PAYSTACK_SECRET_KEY"),
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}
