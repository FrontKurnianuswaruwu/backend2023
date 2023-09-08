<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('code');
            $table->string('published_year',4);
            $table->string('city');
            $table->bigInteger('id_publisher');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};