<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Models\Category;
use App\Models\product;
use App\Models\ProductXCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductoController extends Controller{
    
    public function index(){
        $productos = product::orderBy('id', 'desc')->paginate();

        return view('productos.index', compact('productos'));
    }

    public function create(){
        $categories = Category::all();
        return view('productos.add', compact('categories'));
    }

    public function store(StoreProduct $request){
        $request['slug'] = Str::slug($request->name, '-');
        
        $producto = product::create($request->all()) ;

        ProductXCategory::create(['product_id' => $producto->id,
        'category_id' => $producto->idCategory]);

        return redirect()->route('productos.show', $producto);
    }

    public function show(product $producto){
        return view('productos.show', compact('producto'));
    }

    public function edit(product $producto){
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, product $producto){
        $producto->update($request->all());

        return redirect()->route('productos.show', $producto);
    }

    public function destroy(product $producto){
        $producto->delete();

        return redirect()->route('productos.index');
    }
}