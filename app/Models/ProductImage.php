<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public $fillable = ['image_id', 'type', 'priority', 'active'];


    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function image()
    {
        return $this->belongsTo('App\Models\File', 'image_id', 'id');
    }
}
