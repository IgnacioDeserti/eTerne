<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Concerns\HasAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    use HasAttributes;
    /**
     * Summary of guarded
     * @var array
     */
    protected $guarded = [];


    /**
     * Summary of getRouteKeyName
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Summary of category
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category(){
        return $this->hasOne('App\Models\ProductXCategory');
    }

    /**
     * Summary of images
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images(){
        return $this->hasMany('App\Models\ImageProducts');
    }
    
    /**
     * Summary of videos
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function videos(){
        return $this->hasMany('App\Models\VideoProducts');
    }

}
