<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('quantity');
            $table->json('color')->nullable();
            $table->json('size')->nullable();
            $table->decimal('price',8,2);
            $table->integer('offer')->nullable();
            $table->decimal('price_after_offer',8,2)->nullable();
            $table->boolean('status')->default(1);
            $table->integer('stock')->nullable();
            $table->foreignId('category_id')->references('id')->on('categories')->cascadeOnUpdate()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
