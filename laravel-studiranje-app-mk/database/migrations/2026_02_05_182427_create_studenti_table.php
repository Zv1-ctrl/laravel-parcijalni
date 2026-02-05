<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
{
    Schema::create('studenti', function (Blueprint $table) {
        $table->id();
        $table->string('ime');
        $table->string('prezime');
        $table->date('datum_rod'); 
        $table->string('mbr')->unique();
        $table->decimal('stipendija', 10, 2);
        $table->string('mjesto')->nullable();
        

        $table->unsignedBigInteger('fakultetid'); 
        

    $table->foreign('fakultetid')->references('id')->on('fakulteti')->onDelete('cascade');

    $table->timestamps();
});
}

    public function down(): void
    {
        Schema::dropIfExists('studenti');
    }
};
