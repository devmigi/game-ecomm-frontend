<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{

    public function page()
    {
        return $this->belongsTo('App\Models\Page', 'page_id', 'id');
    }


    public function items()
    {
        return $this->hasMany('App\Models\PageSectionItem', 'page_section_id', 'id');
    }
}
