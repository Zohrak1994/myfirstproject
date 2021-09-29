<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    public function users() {
        return $this->belongsTo('App\Models\users');
    }
    public function order_details() {
        return $this->hasMany('App\Models\Order_details');
    }
}
