<?php
namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Request;
    class AdminController extends controller{

        public function index(){
            return view('admin.index');
        }

        public function action(Request $request){
            switch ($request->get("action")){
                case "products":
                    $productC = new ProductoController;
                    return $productC->index();

                case "categories":
                    $productC = new ProductoController;
                    return $productC->index();

                case "users":
                    return view("admin.userList");
            }
        }

        public function showAssignRole($id){
            $user = User::find($id);
            if ($user->hasRole("admin") != null) {
                $user->role = "admin";
            } 
            return view('admin.assignRole', compact('user'));
        }

        public function assignRoleUser(User $user){
            $role = Role::find(1);
            User::find($user->id)->assignRole($role);
            return view("admin.index");
        }

        public function deallocateRoleUser(User $user){
            $role = Role::find(1);
            User::find($user->id)->removeRole($role);
            return view("admin.index");
        }
    }
