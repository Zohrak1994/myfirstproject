<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eloquent;

class Products extends Model
{
    
    use HasFactory;
    public $timestamps = false;
    protected $table = 'products';

    public function users() {
        return $this->belongsTo('App\Models\User');
    }
    public function categories() {
        return $this->belongsTo('App\Models\Categories');
    }
    public function order_details() {
        return $this->hasMany('App\Models\Order_details');
    }
    public function photos() {
        return $this->hasMany('App\Models\Photo');
    }
    public function feedback() {
        return $this->hasMany('App\Models\Feedback');
    }
    public function carts() {
        return $this->hasOne('App\Models\Cart');
    }
    public function wishlists() {
        return $this->hasOne('App\Models\Wishlist');
    }
}

