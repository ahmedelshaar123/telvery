<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{

    protected $table = 'governorates';
    public $timestamps = true;
    protected $fillable = array('name_ar', 'name_en');

    public function shippings()
    {
        return $this->hasMany('App\Models\Shipping');
    }

    public function deliveryCosts()
    {
        return $this->hasMany('App\Models\DeliveryCost');
    }

}
