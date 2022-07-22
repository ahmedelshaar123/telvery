<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('name_ar', 'name_en', 'value_ar', 'value_en', 'key', 'type');

}