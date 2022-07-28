<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Client extends Authenticatable
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('first_name', 'last_name', 'email', 'password', 'pin_code', 'is_active');
    protected $hidden = array('password', 'pin_code');

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function photo()
    {
        return $this->morphOne('App\Models\Photo', 'photoable')->where('type', '=', 'image');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function shippings()
    {
        return $this->hasMany('App\Models\Shipping');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

    public function carts()
    {
        return $this->hasMany('App\Models\Cart');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function replies()
    {
        return $this->hasMany('App\Models\Reply');
    }

    public function reactions()
    {
        return $this->hasMany('App\Models\Reaction');
    }
}
