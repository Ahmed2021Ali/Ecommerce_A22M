<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title_h1')->nullable();
            $table->string('title_h2')->nullable();
            $table->string('title_h4')->nullable();
            $table->string('title_p')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
