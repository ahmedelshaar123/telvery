<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model 
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('first_name', 'last_name', 'email', 'password', 'pin_code', 'is_active');
    protected $hidden = array('password', 'pin_code');

}