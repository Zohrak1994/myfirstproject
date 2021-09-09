<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eloquent;

class Categories extends Model
{
    
    use HasFactory;
    public $timestamps = false;
    protected $table = 'categories';

    public function products() {
        return $this->hasMany('App\Models\Products');
    }

}
