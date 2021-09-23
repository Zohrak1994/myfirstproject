<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eloquent;

class Photo extends Model
{
    
    use HasFactory;
    public $timestamps = false;
    protected $table = 'photos';
    public function users() {
        return $this->belongsTo('App\Models\User');
    }
    public function products() {
        return $this->belongsTo('App\Models\Products');
    }

}



// protected $table = 'articles';
    
// public function user() {
//     return $this->belongsTo('App\Models\User');
// }

// public function category() {
//     return $this->belongsTo('App\Models\Category');
// }


// $article(Products) = \App\Models\Article(Products)::with(['user','category'])->get();