<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    //
    use SoftDeletes;
    protected $appends = ['lowestRoomPrice'];

    public function rooms()
    {
        return $this->hasMany('App\Room');
    }

    public function getLowestRoomPriceAttribute ()
    {
        $prices = $this->rooms->filter(function ($item) {
            return !is_null($item->price);
        });
        return $prices->min('price');
    }



}
