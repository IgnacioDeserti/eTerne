<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $productos = Product::all();
        $photo = [];

        $imagenes = DB::table('image_products')
            ->join('products', 'image_products.product_id', '=', 'products.id')
            ->select('image_products.url', 'products.id')
            ->get();

        foreach ($imagenes as $imagen) {
            $photo[$imagen->id][] = $imagen->url;
        }

        // Combinar los datos en un solo array asociativo
        $data = [
            'productos' => $productos,
            'photo' => $photo
        ];

        // Codificar el array como JSON
        $jsonDatos = json_encode($data);

        print_r($jsonDatos);

        return view('welcome', compact('jsonDatos'));
    }
}
