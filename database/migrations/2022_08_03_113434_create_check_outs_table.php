<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_outs', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->foreignId('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->references('id')->on('products')->constrained()->onDelete('cascade');
            $table->string('cart_id');
            $table->string('address');
            $table->decimal('subTotal', 8,2);
            $table->string('status');
            $table->string('phone');
            $table->string('card_number');
            $table->string('order_id');
            $table->string('order_quantity');
            $table->string('order_price');
            $table->string('shipping')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_outs');
    }
};
