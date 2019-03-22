<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['customer_id', 'time_from','time_to' ,'amount' ,'tax','fee','room_id','hotel_id','aditioal_information'];

    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }

    public function rooms()
    {
        return $this->belongsToMany('App\Room');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

}
