<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->string('quantity');
            $table->string('price');
            $table->integer('offer');
            $table->decimal('price_after_offer',8,2);
            $table->decimal('total_price',8,2);
            $table->boolean('delivery_status')->default(0);
            $table->foreignId('address_id')->references('id')->on('addresses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('product_id')->references('id')->on('products')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
