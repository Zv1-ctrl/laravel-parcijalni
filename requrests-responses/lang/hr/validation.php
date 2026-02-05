<?php

return [

    'required' => 'Polje :attribute je obavezno.',
    'string' => 'Polje :attribute mora biti tekst',
    'numeric' => 'Polje :attribute mora biti broj',
    'integer' => 'Polje :attribute mora biti cijeli broj',
    'email' => 'Polje :attribute mora biti email adresa',

    'min' => [
        'string' => 'Polje :attribute mora imati najmanje :min znakova.',
        'numeric' => 'Polje :attribute mora imati najmanju :min vrijednost.',
        'integer' => 'Polje :attribute mora imati najmanju :min vrijednost.',
    ],

    'max' => [
        'string' => 'Polje :attribute mora imati najviše :max znakova.',
        'integer' => 'Polje :attribute mora imati najvišu :max vrijednost.',
    ],

    'between' => [
        'numeric' => 'Polje :attribute mora imati između :min i :max',
    ],

    'in' => 'Odabrana vrijednost za :attribute nije dozvoljena',

    'attributes' => [
        'name'=>'naziv',
        'price'=>'cijena',
        'category'=>'kategorija',
        'age'=>'dob',
        'gender'=>'spol',
        'title'=>'naslov',
        'quantity'=>'količina',
        'description'=>'opis',
    ],

];