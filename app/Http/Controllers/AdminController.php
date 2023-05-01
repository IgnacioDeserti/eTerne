<?php
namespace App\Http\Controllers;
use App\Http\Livewire\SearchUsers;
use App\Models\User;
    class AdminController extends Controller{

        public function index(){
            return view('admin.index');
        }

        public function indexProducts(){
            $productC = new ProductoController;
            $productC->index();
        }

        public function indexCategories(){
            $categoryC = new CategoryController;
            $categoryC->index();
        }

        public function userList(){
            $userList = new SearchUsers;
            $userList->render();
        }
    }
?>
