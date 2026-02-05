<?php

namespace App\Models;

class Category{

    public int $id;
    public string $opis;
    public int $popularnost;

    public function __construct(int $id, string $opis, int $popularnost){
        $this->id=$id;
        $this->opis=$opis;
        $this->popularnost=$popularnost;
    }
}