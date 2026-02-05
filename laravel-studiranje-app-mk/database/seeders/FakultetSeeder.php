<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fakultet;

class FakultetSeeder extends Seeder
{
    public function run(): void
    {
        Fakultet::create(['naziv' => 'FER', 'mjesto' => 'Zagreb']);
        Fakultet::create(['naziv' => 'PMF', 'mjesto' => 'Zagreb']);
        Fakultet::create(['naziv' => 'FOI', 'mjesto' => 'Varaždin']);
    }
}
