<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factuur extends Model
{
    protected $fillable = [
        'user_id', 'product_ids',
    ];

    protected $table = 'factuur';

    public function getTotal()
    {
        $ids = explode(',', $this->product_ids);
        $total = 0;
        foreach($ids as $idx => $id) {
            $uitvoering = Uitvoering::find($id);
            $total += $uitvoering->cursus->prijs;
        }
        return $total;
    }

    public function getUitvoeringen()
    {
        $ids = explode(',', $this->product_ids);
        $return = [];
        foreach($ids as $idx => $id) {
            $uitvoering = Uitvoering::find($id);
            $return[] = $uitvoering;
        }
        return $return;
    }
}
