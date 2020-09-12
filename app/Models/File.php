<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['web_url'];


    /**
     * Get the full image url
     *
     * @param  string  $value
     * @return string
     */
    public function getWebUrlAttribute()
    {
        return env('APP_URL'). "/{$this->path}";
    }
}
