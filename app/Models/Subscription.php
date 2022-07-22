<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model 
{

    protected $table = 'subscriptions';
    public $timestamps = true;
    protected $fillable = array('email');

}