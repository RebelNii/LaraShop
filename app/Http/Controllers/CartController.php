<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Cart;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //

    public function index(){
        $id = auth()->id();
        return view('cart.index',[
            'carts' => Cart::where('user_id',$id)->get()
        ]);
    }



    public function cart(Products $product, Request $request){
        //dd($request);
        $id = $product->id;
        $items = Cart::where('product_id',$id)->get()->first();

        if(Auth::check()){
            if(!$items){
                $cart = [
                    'product_id' => $product->id,
                    'price' => $product->product_price,
                    'user_id' => auth()->id()
                ];

                Cart::create($cart);

                Activity::create([
                    'user_id' => auth()->id(),
                    'activity' => auth()->user()->first_name . " " . 'added item to cart'
                ]);

                return redirect('/')->with('message', 'Cart updated');
            }else{
                return redirect('/')->with('message', 'Item already exist in Cart');
            }
        }else{
            return redirect('/login')->with('message','Please login');
        }

        
    }

    public function update(Request $request, Cart $cart){
        //dd($request->all());
        //dd($cart);
        if($cart->user_id == auth()->id()){
            $update = [
                'price' => $request->hidden_price2,
                'quantity' => $request->cart_quantity
            ];
        }

        $cart->update($update);

        Activity::create([
            'user_id' => auth()->id(),
            'activity' => auth()->user()->first_name . " " . 'updated cart item'
        ]);

        return redirect('/cart')->with('message', 'Item Updated');
    }

    public function destroy(Cart $cart){
        if($cart->user_id == auth()->id()){
            $cart->delete();

            Activity::create([
                'user_id' => auth()->id(),
                'activity' => auth()->user()->first_name . " " . 'deleted cart item'
            ]);
        }

        return redirect('/cart')->with('message', 'Item Deleted');
    }


    public function pay(){
        return view('cart.checkout');
    }

    public function paystack(){
        return view('cart.momo');
    }


}
