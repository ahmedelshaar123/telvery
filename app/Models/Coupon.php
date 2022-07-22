<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model 
{

    protected $table = 'coupons';
    public $timestamps = true;
    protected $fillable = array('code', 'num_users', 'expiry_date', 'discount', 'brand_id');

}