<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller{
    
    public function store($file){
        $file->file('photo')->store('product-photos');
    }
    
    public function download($name){

    }
}


?>