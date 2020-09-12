<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function images()
    {
        return $this->hasMany('App\Models\ProductImage', 'product_id', 'id');
    }

    public function attributes()
    {
        return $this->hasMany('App\Models\ProductAttribute', 'attribute_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function version()
    {
        return $this->belongsTo('App\Models\Version', 'version_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function wishlists()
    {
        return $this->hasMany('App\Models\Wishlist');
    }

}
