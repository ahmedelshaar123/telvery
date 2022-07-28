<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{

    protected $table = 'sliders';
    public $timestamps = true;
    protected $fillable = array('title_ar', 'title_en');

    public function photo()
    {
        return $this->morphOne('App\Models\Photo', 'photoable')->where('type', '=', 'image');
    }
}
