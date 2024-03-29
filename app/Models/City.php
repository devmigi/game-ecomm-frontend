<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }


    public function pincodes()
    {
        return $this->hasMany('App\Models\Pincode');
    }
}
