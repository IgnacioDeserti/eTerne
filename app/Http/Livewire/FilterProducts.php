<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class FilterProducts extends Component
{
    public $idCategory;    
    public $search;

    public function updatingSearch(){
        $this->reset();
    }

    public function render()
    {
        $products = Product::where('name', 'LIKE', '%' . $this->search . '%')
        ->where('idCategory', "=", $this->idCategory)
        ->paginate();
        $categories = Category::all();
        
        return view('livewire.filter-products', compact('products', 'categories'));
    }
}
