<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $table = 'reviews';
    public $timestamps = true;
    protected $fillable = array('comment', 'rating', 'client_id', 'product_id');

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
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
