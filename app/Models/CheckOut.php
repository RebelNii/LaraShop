<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckOut extends Model
{
    use HasFactory;
    protected $fillable = ['client_name','user_id','product_id','cart_id','address','subTotal','status',
    'phone','card_number', 'order_id', 'order_quantity', 'order_price', 'shipping'

    ];

    public function check(){
        return $this->belongsTo(Products::class, 'product_id','id');
    }
}
