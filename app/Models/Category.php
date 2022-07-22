<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('name_ar', 'name_en', 'parent_id');

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function subCategories()
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function photo()
    {
        return $this->morphOne('App\Models\Photo', 'photoable')->where('type', '=', 'image');
    }
}
