<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryCost extends Model 
{

    protected $table = 'delivery_costs';
    public $timestamps = true;
    protected $fillable = array('price', 'product_id', 'governorate_id');

}