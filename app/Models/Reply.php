<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{

    protected $table = 'replies';
    public $timestamps = true;
    protected $fillable = array('reply', 'client_id', 'review_id');

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function review()
    {
        return $this->belongsTo('App\Models\Review');
    }
}
