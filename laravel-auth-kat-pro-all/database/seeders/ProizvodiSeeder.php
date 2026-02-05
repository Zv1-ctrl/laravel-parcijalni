<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proizvod;

class ProizvodiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proizvod::updateOrCreate(
        ['naziv' => 'Jabuka'],
        [
            'kolicina' => 100,
            'cijena' => 3.57,
            'kategorija_id' => 2,
        ]
    );

    Proizvod::updateOrCreate(
        ['naziv' => 'Kruška'],
        [
            'kolicina' => 120,
            'cijena' => 5.59,
            'kategorija_id' => 2,
        ]
    );

    Proizvod::updateOrCreate(
        ['naziv' => 'Pelinkovac'],
        [
            'kolicina' => 200,
            'cijena' => 15.59,
            'kategorija_id' => 1,
        ]
    );

    Proizvod::updateOrCreate(
        ['naziv' => 'Novine'],
        [
            'kolicina' => 400,
            'cijena' => 2.39,
            'kategorija_id' => 3,
        ]
    );
    }
}
