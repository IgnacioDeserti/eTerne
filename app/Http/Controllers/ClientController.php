<?php

namespace App\Http\Controllers;

use App\Models\ImageProducts;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('client.profile');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $aux = new ImageProducts;
        $product = new Product;
        $productDB = DB::table('products')
        ->select("*")
        ->where('id', "=", $id)
        ->limit(1)
        ->get();

        $product->setAttribute('id', $productDB[0]->id);
        $product->setAttribute('name', $productDB[0]->name);
        $product->setAttribute('slug', $productDB[0]->slug);
        $product->setAttribute('description', $productDB[0]->description);
        $product->setAttribute('idCategory', $productDB[0]->idCategory);
        $product->setAttribute('stock', $productDB[0]->stock);
        $product->setAttribute('price', $productDB[0]->price);    

        $imagen = DB::table('image_products')
            ->select('image_products.url', 'products.id')
            ->join('products', 'image_products.product_id', '=', 'products.id')
            ->where('image_products.product_id', "=", $id)
            ->limit(1)
            ->get();

            $aux->setAttribute('url', $imagen[0]->url);
            $aux->setAttribute('product_id', $imagen[0]->id);

            return response()->json([
                'product' => $product,
                'image' => $aux->getAttributes()
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
