<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //
    protected $fillable = ['nameOnCard','card_number' ,'ccv' , 'expiration' , 'customer_id'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
