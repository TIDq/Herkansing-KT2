<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cursus extends Model
{
    use SoftDeletes;

    public $table = "cursus";

    public function uitvoering()
    {
        return $this->belongsTo('App\Uitvoering','uitvoering_id');
    }
    public function cart()
    {
        return $this->belongsTo('App\Cart','cart_id');
    }

    protected $fillable = [
      'id', 'cursuscode', 'omschrijving', 'prijs'
    ];
}
