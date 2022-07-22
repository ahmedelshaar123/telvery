<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model 
{

    protected $table = 'static_pages';
    public $timestamps = true;
    protected $fillable = array('name_ar', 'name_en', 'value_ar', 'value_en', 'key', 'type');

}