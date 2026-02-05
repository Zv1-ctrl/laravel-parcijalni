<?php

namespace App\Models;

class Proizvod{
    public int $id;
    public string $naziv;
    public int $kolicina;
    public float $cijena;
    public string $rokisteka;

    public function __construct(int $id, string $naziv, int $kolicina, float $cijena, string $rokisteka){
        $this->id=$id;
        $this->naziv=$naziv;
        $this->kolicina=$kolicina;
        $this->cijena=$cijena;
        $this->rokisteka=$rokisteka;
    }
}