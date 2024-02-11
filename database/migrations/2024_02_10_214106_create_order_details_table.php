<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->string('number_of_product');
            $table->decimal('subtotal',8,2);
            $table->decimal('delivery_price',8,2)->nullable();
            $table->decimal('coupon_value',8,2)->nullable();
            $table->decimal('total',8,2)->nullable();
            $table->boolean('delivery_status')->default(0);
            $table->foreignId('address_id')->references('id')->on('addresses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
