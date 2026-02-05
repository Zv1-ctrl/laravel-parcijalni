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
        Schema::create('prognoze', function (Blueprint $table) {
            $table->id();

             $table->string('grad');                 // Zagreb, Croatia
            $table->date('datum');                  // dan prognoze

            $table->decimal('maxTempC', 5, 2)->nullable();
            $table->string('weather')->nullable();
            $table->decimal('windSpeed', 6, 2)->nullable();
            $table->decimal('visibility', 6, 2)->nullable();

            $table->timestamp('zadnji_dohvat')->nullable();
            $table->timestamps();

            $table->unique(['grad', 'datum']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prognoze');
    }
};
