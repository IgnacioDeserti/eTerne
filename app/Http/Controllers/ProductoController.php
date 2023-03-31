<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Models\Category;
use App\Models\product;
use App\Models\ProductXCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
        
        $producto = product::create($request->except('photo', 'video'));

        foreach($request->file('photo') as $photo){
            $imageName = $photo->getClientOriginalName();
            $uniqueImageName = time().rand(99,9999).$imageName;
            Storage::putFileAs('public/product-photos/', $photo, $uniqueImageName);
            DB::insert('INSERT INTO image_products (url, product_id) VALUES (:url, :product_id)', ['url' => 'storage/product-photos/'.$uniqueImageName, 'product_id' => $producto->id]);
        }

        foreach($request->file('video') as $video){
            $videoName = $video->getClientOriginalName();
            $uniqueVideoName = time().rand(99,9999).$videoName;
            Storage::putFileAs('public/product-videos/', $video, $uniqueVideoName);
            DB::insert('INSERT INTO video_products (url, product_id) VALUES (:url, :product_id)', ['url' => 'storage/product-videos/'.$uniqueVideoName, 'product_id' => $producto->id]);
        }
        
        ProductXCategory::create(['product_id' => $producto->id,
        'category_id' => $producto->idCategory]);
        
        return redirect()->route('productos.show', $producto);
    }

    public function show(product $producto){
        
        $photos = DB::select('SELECT * from image_products WHERE product_id = ?', [$producto->id]);
        $videos = DB::select('SELECT * from video_products WHERE product_id = ?', [$producto->id]);

        return view('productos.show', compact('producto', 'photos', 'videos'));
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