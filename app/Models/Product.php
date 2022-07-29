<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = array('name_ar', 'name_en', 'best_seller', 'type', 'color', 'in_stock',
        'price_before', 'price_after', 'sku', 'detail_ar', 'detail_en', 'specification_ar',
        'specification_en', 'video_url', 'black_friday', 'today_deal', 'brand_id', 'category_id', 'user_id');

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    public function photos()
    {
        return $this->morphMany('App\Models\Photo', 'photoable')->where('type', '=', 'images');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

    public function carts()
    {
        return $this->hasMany('App\Models\Cart');
    }

    public function DeliveryCosts()
    {
        return $this->hasMany('App\Models\DeliveryCost');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
    }

    public function linkedProducts()
    {
        return $this->hasMany('App\Models\LinkedProduct');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function threeDImages()
    {
        return $this->morphMany('App\Models\Photo', 'photoable')->where('type', '=', '3d');
    }



}
