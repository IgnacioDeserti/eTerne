<?php

namespace App\Http\Controllers;

use App\Models\ImageProducts;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function shop()
    {
        $products = Product::all();
        return view('shop', compact('products'));
    }

    public function cart($mensaje = null)  {
        $cartCollection = \Cart::getContent();
        if($mensaje){
            return view('shopping.cart-index')->with(compact('cartCollection', 'mensaje'));
        }else{
            return view('shopping.cart-index')->with(compact('cartCollection'));
        }
    }
    public function remove(Request $request){
        \Cart::remove($request->id);
        $mensaje = "El item se removió con éxito";
        return $this->cart($mensaje);
    }

    public function add(Request $request){
        $aux = new ImageProducts;
        $imagen = DB::table('image_products')
        ->select('image_products.url', 'products.id')
        ->join('products', 'image_products.product_id', '=', 'products.id')
        ->where('image_products.product_id', "=", $request->id)
        ->limit(1)
        ->get();

        $aux->setAttribute('url', $imagen[0]->url);
        $aux->setAttribute('product_id', $imagen[0]->id);

        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $aux->getAttribute('url'),
            )
        ));
        return $this->cart();
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        $mensaje = 'El carrito se actualizó!';
        return $this->cart($mensaje);
    }

    public function clear(){
        \Cart::clear();
        $mensaje = 'El carrito se vació';
        return $this->cart($mensaje);
    }

 

}
