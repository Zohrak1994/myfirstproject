<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'wishlists';
    public function users() {
        return $this->belongsTo('App\Models\User');
    }
    public function products() {
        return $this->belongsTo('App\Models\Products');
    }
    public function photos() {
        $product= new Products;
        return $product->hasMany('App\Models\Photo');
    }
}
