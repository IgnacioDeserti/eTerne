<?php

namespace App\Http\Controllers;

use App\Models\ImageProducts;
use App\Models\Product;
use App\Models\User;
use App\Models\VideoProducts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Revolution\Google\Sheets\Facades\Sheets;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Request;
use App\Models\Category;

class AdminController extends controller
{

    public function index()
    {
        return view('admin.index');
    }

    public function action(Request $request)
    {
        switch ($request->get("action")) {
            case "products":
                $productC = new ProductoController;
                return $productC->index();

            case "categories":
                $productC = new ProductoController;
                return $productC->index();

            case "users":
                return view("admin.userList");

            case "spreadsheet":
                return $this->spreadsheet();
        }
    }

    public function showAssignRole($id)
    {
        $user = User::find($id);
        if ($user->hasRole("admin") != null) {
            $user->role = "admin";
        }
        return view('admin.assignRole', compact('user'));
    }

    public function assignRoleUser(User $user)
    {
        $role = Role::find(1);
        User::find($user->id)->assignRole($role);
        return view("admin.index");
    }

    public function deallocateRoleUser(User $user)
    {
        $role = Role::find(1);
        User::find($user->id)->removeRole($role);
        return view("admin.index");
    }

    public function spreadsheet()
    {
        echo "<pre>";
        $dataProducts = Sheets::spreadsheet("12MlT5hdzOzFhphJvUW3oumPrW4JNE_JFaGm1qP17vMQ")
            ->sheet('Productos')
            ->get();

        $header = $dataProducts->pull(0);

        for($i=1; $i <= count($dataProducts); $i++){
            $data = Sheets::collection($header, $dataProducts[$i]);
            print_r($data);
            $valuesProducts = $data;
        }
        $valuesProducts->toArray();

        
        //print_r($valuesProducts);
        //print_r($aux);
        //print_r($header);

        /*$dataCategories = Sheets::spreadsheet("12MlT5hdzOzFhphJvUW3oumPrW4JNE_JFaGm1qP17vMQ")
            ->sheet('Tipo de Productos')
            ->get();

        $header = $dataCategories->pull(0);
        $valuesCategories = Sheets::collection($header, $dataCategories);
        $valuesCategories->toArray();*/
        
        /*for($i = 1; $i <= count($valuesCategories); $i++){
            $category = new Category;
            $category->setAttribute('id', $valuesCategories[$i]['Cod_Tprodu']);
            $category->setAttribute('name', $valuesCategories[$i]['Tipo de Producto']);
            $category->setAttribute('slug', Str::slug($category->getAttribute('name'), '-'));
            Category::create($category->getAttributes());
        }*/
        
        //print_r($valuesProducts[208]['Pausar Publicacion']);

        /* $product = new Product;

        $product->setAttribute('id', $valuesProducts[208]['Cod. P']);
        $product->setAttribute('name', $valuesProducts[208]['Producto']);
        $product->setAttribute('brand', $valuesProducts[208]['Marca']);
        $product->setAttribute('description', "Muy bueno");
        $product->setAttribute('idCategory', $this->idCategory($valuesProducts[208]['Tipo de Producto'])[0]->id);
        $product->setAttribute('slug', Str::slug($product->getAttribute('name'), '-'));
        $product->setAttribute('price', 18000);
        if(strcmp("TRUE", $valuesProducts[208]['Pausar Publicacion']) == 0){
            $product->setAttribute('hidden', 0);
        }else{
            $product->setAttribute('hidden', 1);
        }

        Product::create($product->getAttributes());

        if($valuesProducts[208]['Link Imagen 1']){
            $imageProduct = new ImageProducts;
            $imageProduct->setAttribute('url', $valuesProducts[208]['Link Imagen 1']);
            $imageProduct->setAttribute('product_id', $valuesProducts[208]['Cod. P']);
            ImageProducts::create($imageProduct->getAttributes());
        }

        if($valuesProducts[208]['Link Imagen 2']){
            $imageProduct2 = new ImageProducts;
            $imageProduct2->setAttribute('url', $valuesProducts[208]['Link Imagen 2']);
            $imageProduct2->setAttribute('product_id', $valuesProducts[208]['Cod. P']);
            ImageProducts::create($imageProduct2->getAttributes());
        }

        if($valuesProducts[208]['Link Imagen 3']){
            $imageProduct3 = new ImageProducts;
            $imageProduct3->setAttribute('url', $valuesProducts[208]['Link Imagen 3']);
            $imageProduct3->setAttribute('product_id', $valuesProducts[208]['Cod. P']);
            ImageProducts::create($imageProduct->getAttributes());
        }

        if($valuesProducts[208]['Link Imagen 4']){
            $imageProduct4 = new ImageProducts;
            $imageProduct4->setAttribute('url', $valuesProducts[208]['Link Imagen 4']);
            $imageProduct4->setAttribute('product_id', $valuesProducts[208]['Cod. P']);
            ImageProducts::create($imageProduct->getAttributes());
        }

        if($valuesProducts[208]['Link Video']){
            $videoProduct = new VideoProducts;
            $videoProduct->setAttribute('url', $valuesProducts[208]['Link Video']);
            $videoProduct->setAttribute('product_id', $valuesProducts[208]['Cod. P']);
            VideoProducts::create($videoProduct->getAttributes());
        } */
    }

    public function idCategory($name){
        return DB::table('categories')
        ->select('id')
        ->where('name', "=", $name)
        ->get();
    }
}
