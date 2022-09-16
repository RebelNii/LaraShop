<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    //
    public function index(){
        return view('cart.wishlist');
    }

    public function store(Products $wish){
        $id = $wish->id;
        $items = Wishlist::where('product_id',$id)->get()->first();

        if(Auth::check()){
            if(!$items){
                $wishList = [
                    'user_id' => auth()->id(),
                    'product_id' => $wish->id,
                    'price' => $wish->product_price
                ];

                Wishlist::create($wishList);
                return redirect('/')->with('message', 'Item added to WishList');
            }else{
                return redirect('/')->with('message','Item already exists in WishList');
            }
        }else{
            return redirect('/login')->with('message', 'Please Login');
        }
    }
}
