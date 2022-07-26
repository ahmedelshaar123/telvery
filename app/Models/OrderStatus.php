<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{

    protected $table = 'order_statuses';
    public $timestamps = true;
    protected $fillable = array('status', 'order_id');

    public function order() {
        return $this->belongsTo("App/Models/Order");
    }
}
