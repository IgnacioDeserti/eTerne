<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategory;
use App\Http\Requests\StoreProduct;
use App\Models\Category;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller{
    
    public function index(){
        $categories = Category::orderBy('id', 'desc')->paginate();

        return view('categories.index', compact('categories'));
    }

    public function create(){
        return view('categories.add');
    }

    public function store(StoreCategory $request){
        $request['slug'] = Str::slug($request->input('name'), '-');
        $category = Category::create($request->all());
        
        return $this->show($category);
    }

    public function show(Category $category){
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category){
        return view('categories.edit', compact('category'));
    }

    public function update(StoreCategory $request, Category $category){
        $request['slug'] = Str::slug($request->input('name'), '-');
        $category->update($request->all());

        return $this->show($category);
    }

    public function destroy(Category $category){
        $category->delete();

        return redirect()->route('categories.index');
    }

}

?>