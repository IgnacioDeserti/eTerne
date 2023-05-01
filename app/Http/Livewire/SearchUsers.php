<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class SearchUsers extends Component
{

    public $search;

    public function render()
    {
        $users = User::paginate();
        return view('livewire.search-users', compact('users'));
    }
}
