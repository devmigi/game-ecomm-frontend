<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function image()
    {
        return $this->belongsTo('App\Models\File', 'image_id', 'id');
    }
}
