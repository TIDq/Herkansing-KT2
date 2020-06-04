<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uitvoering extends Model
{

    protected $fillable = [
        'begin_datum', 'eind_datum', 'cursus_id'
    ];

    public function cursus() {
        return $this->belongsTo('App\Cursus', 'cursus_id');
    }
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $table = 'uitvoering';
}
