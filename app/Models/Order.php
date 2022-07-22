<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model 
{

    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array('total_price', 'delivery_cost', 'transaction_id', 'coupon_id', 'shipping_id');

}