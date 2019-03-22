<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
    //

    protected $fillable = ['firstName','lastName','email','phone'];

    public function cards()
    {
        return $this->hasMany('App\Card');
    }

    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }
}
