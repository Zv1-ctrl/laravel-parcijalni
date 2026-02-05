<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

public function up(): void
{
    Schema::create('fakulteti', function (Blueprint $table) {
        $table->id();
        $table->string('naziv');
        $table->string('mjesto');
        $table->timestamps();
    });

    }

    public function down(): void
    {
        Schema::dropIfExists('fakulteti');
    }

    
};
