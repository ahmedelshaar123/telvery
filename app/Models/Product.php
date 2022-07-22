<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{

    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = array('name_ar', 'name_en', 'best_seller', 'type', 'color', 'in_stock', 'price_before', 'price_after', 'sku', 'detail_ar', 'detail_en', 'specification_ar', 'specification_en', 'video', 'black_friday', 'today_deal', 'brand_id', 'category_id');

}