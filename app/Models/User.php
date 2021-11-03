<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Eloquent;
class User extends Model
{
    use HasFactory,HasRoles;
    public $timestamps = false;
    protected $table = 'users';
    public function products() {
        return $this->hasMany('App\Models\Products');
    }
    public function carts() {
        return $this->belongsToMany('App\Models\Cart');
    }
    public function wishlists() {
        return $this->belongsToMany('App\Models\Wishlist');
    }
    public function orders() {
        return $this->hasMany('App\Models\orders');
    }
}
