<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prognoza extends Model
{
    protected $table = 'prognoze';

    protected $fillable = [
        'grad','datum','maxTempC','weather','windSpeed','visibility','zadnji_dohvat'
    ];

    protected $casts = [
        'datum' => 'date',
        'zadnji_dohvat' => 'datetime',
    ];
}
