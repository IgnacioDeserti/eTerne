<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductXCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product(){
        return $this->belongsTo('App\Models\product');
    }

    public function category(){
        return $this->belongsTo('App\Models\category');
    }
}
