<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{

    protected $table = 'shippings';
    public $timestamps = true;
    protected $fillable = array('address', 'zip_code', 'phone', 'client_id', 'governorate_id');

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function governorate()
    {
        return $this->belongsTo('App\Models\Governorate');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
}
