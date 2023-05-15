<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class SearchProducts extends Component
{
    public $search;

    public function updatingSearch(){
        $this->reset();
    }

    public function render()
    {
        $categories = Category::all();
        $products = Product::where('name', 'LIKE', '%' . $this->search . '%')
        ->paginate();

        return view('livewire.search-products', compact('products', 'categories'));
    }
}
