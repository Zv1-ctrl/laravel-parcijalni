<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proizvod extends Model
{
    protected $table = 'proizvodi';

    protected $fillable = [
        'naziv',
        'kolicina',
        'cijena',
        'kategorija_id',
    ];

    public function kategorija()
    {
        return $this->belongsTo(Kategorija::class);
    }
}
