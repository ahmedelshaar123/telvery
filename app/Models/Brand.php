<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    protected $table = 'brands';
    public $timestamps = true;
    protected $fillable = array('name_ar', 'name_en');

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function coupons()
    {
        return $this->hasMany('App\Models\Coupon');
    }
}
