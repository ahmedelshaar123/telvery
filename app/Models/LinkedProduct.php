<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkedProduct extends Model
{

    protected $table = 'linked_products';
    public $timestamps = true;
    protected $fillable = array('product_id', 'linked_product_id', 'type');

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
    public function linkedProduct()
    {
        return $this->belongsTo('App\Models\Product', 'linked_product_id');
    }
}
