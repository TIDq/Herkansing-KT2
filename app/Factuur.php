<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factuur extends Model
{
    protected $fillable = [
        'omschrijving', 'begin', 'eind', 'prijs',
    ];

    protected $table = 'factuur';

}
