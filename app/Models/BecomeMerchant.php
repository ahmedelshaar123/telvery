<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BecomeMerchant extends Model 
{

    protected $table = 'become_merchants';
    public $timestamps = true;
    protected $fillable = array('email', 'phone', 'is_active');

}