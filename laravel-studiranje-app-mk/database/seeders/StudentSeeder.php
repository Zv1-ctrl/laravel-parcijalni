<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Fakultet;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $fer = Fakultet::where('naziv', 'FER')->first();
        $pmf = Fakultet::where('naziv', 'PMF')->first();

        Student::create([
            'ime' => 'Ivan',
            'prezime' => 'Ivić',
            'datum_rod' => '2002-05-10',
            'mbr' => 12345,
            'stipendija' => 150.50,
            'mjesto' => 'Zagreb',
            'fakultetid' => $fer->id,
        ]);

        Student::create([
            'ime' => 'Ana',
            'prezime' => 'Anić',
            'datum_rod' => '2001-11-03',
            'mbr' => 22222,
            'stipendija' => 0,
            'mjesto' => null, // OVAJ će biti blokiran na show/edit i neće biti na listi
            'fakultetid' => $pmf->id,
        ]);
    }
}
