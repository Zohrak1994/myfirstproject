<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'order_details';
    public function products() {
        return $this->belongsTo('App\Models\Products');
    }
    public function orders() {
        return $this->belongsTo('App\Models\orders');
    }

}
