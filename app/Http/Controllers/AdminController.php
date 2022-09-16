<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\CheckOut;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.index',[
            'users' => User::all(),
            'products' => Products::all(),
            'checkouts' => CheckOut::latest()->get(),
            'admin_activities' => Activity::whereId(1)->get(),
            'client_activities' => Activity::all(),
        ]);
    }

    public function products(){
        return view('admin.products', [
            'products' => Products::latest()->where(function($query){
                if($filter = request('search')){
                    //dd(request('filter'));
                    $query->where('product_name', 'LIKE', "%{$filter}%");
                    $query->orWhere('category', 'LIKE', "%{$filter}%");
                    $query->orWhere('brand', 'LIKE', "%{$filter}%");
                }
            })->get()
        ]);
    }

    public function add(){
        return view('admin.addProduct');
    }

    public function store(Request $request){
        dd($request);

        $product = $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
            'product_old' => 'required',
            'brand' => 'required',
            'category' => 'required'
        ]);

        if($request->hasFile('product_image')){
            $product['product_image'] = $request->file('product_image')->store('img','public');
        }

        Activity::create([
            'user_id' => auth()->id(),
            'admin_activity' => 'Admin uploaded new product'
        ]);

        Products::create($product);
        return redirect('/admin/products')->with('message','Product Added');
    }

    public function users(){
        return view('admin.users', [
            'users' => User::latest()->where(function($query){
                if($filter = request('search')){
                    //dd(request('filter'));
                    $query->where('first_name', 'LIKE', "%{$filter}%");
                    $query->orWhere('last_name', 'LIKE', "%{$filter}%");
                    $query->orWhere('email', 'LIKE', "%{$filter}%");
                }
            })->paginate(2)
        ]);
    }
}
