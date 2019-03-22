<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Amenity extends Model
{


    protected $fillable = ['name', 'description'];

    public function rooms()
    {
        return $this->belongsToMany('App\Room','room_amenities');
    }
}
