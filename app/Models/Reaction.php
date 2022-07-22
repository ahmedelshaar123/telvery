<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model 
{

    protected $table = 'reactions';
    public $timestamps = true;
    protected $fillable = array('type', 'client_id', 'review_id');

}