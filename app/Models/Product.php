<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function photo(){
        //relacion 1 a 1
        return $this->hasOne($this->id, 'idImageable', Image::class);
    }

    public function category(){
        return $this->hasOne('App\Models\ProductXCategory');
    }

    public function images(){
        return $this->hasMany('App\Models\ImageProducts');
    }
    
    public function videos(){
        return $this->hasMany('App\Models\VideoProducts');
    }
}
