<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSectionItem extends Model
{

    public function image()
    {
        return $this->belongsTo('App\Models\File', 'image_id', 'id');
    }


    public function section()
    {
        return $this->belongsTo('App\Models\PageSection', 'page_section_id', 'id');
    }


    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'item_id', 'id');
    }

}
