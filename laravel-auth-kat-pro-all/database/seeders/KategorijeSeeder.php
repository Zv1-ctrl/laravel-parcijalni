<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategorija;
class KategorijeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Kategorija::updateOrCreate(['naziv' => 'Pića'], ['aktivna' => true]);
        Kategorija::updateOrCreate(['naziv' => 'Hrana'], ['aktivna' => true]);
        Kategorija::updateOrCreate(['naziv' => 'Arhiva'], ['aktivna' => false]);
    }
}
