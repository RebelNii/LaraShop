<?php

namespace App\Models;

use App\Models\CheckOut;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['product_name','product_image','product_price','product_old',
    'product_description', 'category','brand'];

    public function son(){
        return $this->hasMany(Cart::class);
    }

    public function checks(){
        return $this->hasMany(CheckOut::class);
    }
}
