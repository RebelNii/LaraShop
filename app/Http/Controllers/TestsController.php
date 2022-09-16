<?php

namespace App\Http\Controllers;

use App\Mail\CheckOutMail;
use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestsController extends Controller
{
    //

    public function index(){
        //dd($request);
        $firstName = 'lol';
        $lastName = 'li';
        $address = '123 ldn';
        $city = 'ldn';
        $region = 'ah';
        $postal = '233';
        $phone = '1234';
        $email = 'test@gmail.com';
        $cc = '4242424242424242';
        $cvv = '233';
        $month = '2';
        $year = '2023';
        $country = 'Gh';

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

        $total = '200';

        $charge = $stripe->charges()->create([
            'customer' => $customer['id'],
            'currency' => 'USD',
            'amount' => $total,
            'description' => 'phpunit'
        ]);

        //delete item from cart and move order details in checkout table in database

        //get users cart
        /**$user = auth()->id();
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

            }
        }*/
        Mail::to('test@gmail.com')->send(new CheckOutMail);

        return redirect('/')->with('message', 'Payment Successful');
    }
}
