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
            $table->string('title_h1');
            $table->string('title_h2');
            $table->string('title_h4');
            $table->string('title_p');
            $table->string('status');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
