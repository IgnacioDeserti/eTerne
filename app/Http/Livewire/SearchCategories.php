<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class SearchCategories extends Component
{
    public $search;

    public function updatingSearch(){
        $this->reset();
    }

    public function render()
    {
        $categories = Category::where('name', 'LIKE', '%' . $this->search . '%')
        ->paginate();

        return view('livewire.search-categories', compact('categories'));
    }
}
