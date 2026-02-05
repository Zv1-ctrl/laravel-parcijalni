<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proizvodi', function (Blueprint $table) {
            $table->id();
            $table->string('naziv', 150);
            $table->integer('kolicina');
            $table->decimal('cijena', 10, 2);
            $table->foreignId('kategorija_id')
                  ->constrained('kategorije')
                  ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proizvodi');
    }
};
