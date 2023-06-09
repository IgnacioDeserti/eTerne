<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoProducts extends Model
{
    use HasFactory;
    use HasAttributes;
    protected $fillable = ['url', 'product_id'];

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
