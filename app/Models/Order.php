<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array('status', 'total_price', 'delivery_cost', 'transaction_id', 'payment_method_id', 'coupon_id', 'shipping_id', 'client_id', 'user_id');

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function shipping()
    {
        return $this->belongsTo('App\Models\Shipping');
    }

    public function coupon()
    {
        return $this->belongsTo('App\Models\Coupon');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function PaymentMethod()
    {
        return $this->belongsTo('App\Models\PaymentMethod');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

    public function orderProducts()
    {
        return $this->hasMany('App\Models\OrderProduct');
    }
}
