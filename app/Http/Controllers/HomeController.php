<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class HomeController extends Controller{
    
    public function index(){
        $productos = Product::all();
        $photo = [];

        foreach($productos as $product){
            $photoProduct = DB::select("SELECT url FROM image_products WHERE product_id = ? limit 1", [$product->id]);
            $photo[$product->id] = $photoProduct; 
        }
        // Combinar los datos en un solo array asociativo
        $datos = [
            'productos' => $productos,
            'photo' => $photo
        ];

        // Codificar el array como JSON
        $jsonDatos = json_encode($datos);

        print_r($jsonDatos);

        //return view('welcome', compact('jsonDatos'));
    }
}


