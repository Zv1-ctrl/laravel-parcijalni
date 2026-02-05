<?php

return [

    'required' => 'Polje :attribute je obavezno.',
    'string' => 'Polje :attribute mora biti tekst.',
    'integer' => 'Polje :attribute mora biti cijeli broj.',
    'numeric' => 'Polje :attribute mora biti broj.',
    'min' => [
        'numeric' => 'Polje :attribute mora biti najmanje :min.',
    ],
    'max' => [
        'string' => 'Polje :attribute može imati najviše :max znakova.',
    ],
    'exists' => 'Odabrana vrijednost za :attribute nije ispravna.',


    'attributes' => [
        'naziv' => 'naziv proizvoda',
        'kolicina' => 'količina',
        'cijena' => 'cijena',
        'kategorija_id' => 'kategorija',
    ],
];

