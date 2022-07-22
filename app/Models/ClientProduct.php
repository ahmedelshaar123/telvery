<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientProduct extends Model 
{

    protected $table = 'client_product';
    public $timestamps = true;
    protected $fillable = array('client_id', 'product_id');

}