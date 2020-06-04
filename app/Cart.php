<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'merk', 'nummer', 'status', 'omschrijving', 'type'
    ];

    public function cursus() {
        return $this->belongsTo('App\Cursus', 'cursus_id');
    }

    protected $table = 'cart';
}
