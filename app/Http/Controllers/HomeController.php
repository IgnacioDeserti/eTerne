<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ImageProducts;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('welcome', compact('categories'));
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
        
        $jsonImages = json_encode($imagenes);

        return response()->json($imagenes);
    }

    public function productsByCategory($id){
        $productos = Product::where('idCategory', '=', $id)->get();
        return response()->json($productos);
    }

}
