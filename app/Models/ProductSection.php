<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSection extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id', 'id');
    }
}
