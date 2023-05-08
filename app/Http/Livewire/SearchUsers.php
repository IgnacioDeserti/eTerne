<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;

class SearchUsers extends Component
{
    public $search;

    public function updatingSearch(){
        $this->reset();
    }

    public function render()
    {
        $role = Role::find(1);

        $usersRoles = User::whereHas('roles', function ($query) use ($role) {
            $query->where('id', $role->id);
        })->get();

        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
        ->orWhere('email', 'LIKE', '%' . $this->search . '%')
        ->paginate();

        foreach($usersRoles as $aux){
            foreach($users as $user){
                if($aux->id == $user->id){
                    $user->role = $role->name;
                }
            }
        }
        return view('livewire.search-users', compact('users', 'usersRoles'));
    }
}
