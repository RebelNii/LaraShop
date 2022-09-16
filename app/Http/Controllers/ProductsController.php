<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function index(){
        return view('products.index', [
            'products' => Products::latest()->where(function($query){
                if($search = request('search')){
                    $query->where('product_name', 'LIKE', "%{$search}%");
                    $query->orWhere('brand', 'LIKE', "%{$search}%");
                    $query->orWhere('category', 'LIKE', "%{$search}%");
                }
            })->paginate(8)
        ]);
    }


    public function show(Products $product){
        //dd($product);
        return view('products.show', [
            'product' => $product
        ]);
    }

    
}
