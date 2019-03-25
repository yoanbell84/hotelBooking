<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['room_number', 'floor', 'price','description','status_id','hotel_id','capacity'];


    public function amenities()
    {
        return $this->belongsToMany('App\Amenity','room_amenities');
    }

    public function offers()
    {
        return $this->belongsToMany('App\Offer' ,'room_offers');
    }

    public function availability()
    {
        return $this->belongsTo('App\RoomStatus','status_id');
    }

    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }

    public function getRoomNumberAttribute($value)
    {
        return $this->attributes['floor'].$value;
    }





}
