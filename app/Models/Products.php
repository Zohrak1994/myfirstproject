<?php

namespace App\Models;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    
    use HasFactory;
    public $timestamps = false;
    protected $table = 'products';
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function categories() {
        return $this->belongsTo('App\Models\Categories');
    }

    public function photo() {
        return $this->hasMany('App\Models\Photo');
    }
}

