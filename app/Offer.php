<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Offer extends Model
{
    //

    protected $fillable = ['name','description'];

    public function rooms()
    {
        return $this->belongsToMany('App\Room');
    }
 }
