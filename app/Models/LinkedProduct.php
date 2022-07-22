<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkedProduct extends Model 
{

    protected $table = 'linked_products';
    public $timestamps = true;
    protected $fillable = array('product_id', 'linked_product_id', 'type');

}