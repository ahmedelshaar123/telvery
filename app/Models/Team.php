<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model 
{

    protected $table = 'teams';
    public $timestamps = true;
    protected $fillable = array('name_ar', 'name_en', 'job_ar', 'job_en', 'desc_ar', 'desc_en');

}