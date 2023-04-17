<?php

namespace App\Http\Controllers;

use App\Models\ImageProducts;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $productos = Product::all();
        $imagenes = [];
        $aux = new ImageProducts;
        foreach($productos as $product){
            $imagen = DB::table('image_products')
                ->select('image_products.url', 'products.id')
                ->join('products', 'image_products.product_id', '=', 'products.id')
                ->where('image_products.product_id', "=", $product->getAttribute('id'))
                ->limit(1)
                ->get();

                $aux->setAttribute('url', $imagen[0]->url);
                $aux->setAttribute('product_id', $imagen[0]->id);

                array_push($imagenes, $aux->getAttributes());
            }

        // Combinar los datos en un solo array asociativo
        $data = [
            'products' => $productos,
            'images' => $imagenes
        ];

        $jsonData = json_encode($data);

        return view('welcome', compact('jsonData'));
    }

    public function images(){
        $productos = Product::all();
        $imagenes = [];

        foreach($productos as $product){
            $imagen = DB::table('image_products')
                ->select('image_products.url', 'products.id')
                ->join('products', 'image_products.product_id', '=', 'products.id')
                ->where('image_products.product_id', "=", $product->getAttribute('id'))
                ->limit(1)
                ->get();

                array_push($imagenes, $imagen);
            }

        // Combinar los datos en un solo array asociativo

        // Codificar el array como JSOB
        
        $jsonImages = json_encode($imagenes);

        return response()->json($imagenes);
    }

}
