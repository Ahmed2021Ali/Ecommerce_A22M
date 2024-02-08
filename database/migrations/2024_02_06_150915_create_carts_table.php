<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity')->default(1);
            $table->integer('color')->nullable();
            $table->integer('size')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('product_id')->references('id')->on('products')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
