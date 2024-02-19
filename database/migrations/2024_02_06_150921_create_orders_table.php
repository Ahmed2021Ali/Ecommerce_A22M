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
            $table->decimal('price',8,2);
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->decimal('total_price',8,2);
            $table->foreignId('product_id')->references('id')->on('products')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
