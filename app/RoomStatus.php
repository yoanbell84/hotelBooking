<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomStatus extends Model
{
    //

    protected $table = 'room_status';
    protected $fillable = ['name','description'];

}
