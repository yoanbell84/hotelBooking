<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    //
    use SoftDeletes;

    public function rooms()
    {
        return $this->hasMany('App\Room');
    }
}
