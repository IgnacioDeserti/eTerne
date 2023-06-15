<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ImageProducts;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Darryldecode\Cart\Cart;


class CartController extends Controller
{
    public function updatingSearch()
    {
        $this->reset();
    }

    public function shop()
    {
        $products = Product::all();
        return view('shop', compact('products'));
    }

    public function cart($mensaje = null)
    {
        $categories = Category::all();
        $cartCollection = \Cart::getContent();
        if ($mensaje) {
            return view('shopping.cart-index')->with(compact('cartCollection', 'mensaje', 'categories'));
        } else {
            return view('shopping.cart-index')->with(compact('cartCollection', 'categories'));
        }
    }
    public function remove(Request $request)
    {
        $categories = Category::all();
        \Cart::remove($request->id);
        $mensaje = "El item se removió con éxito";
        return redirect()->route('cart.index')->with(compact('cartCollection', 'mensaje', 'categories'));
    }

    public function add(Request $request)
    {
        $categories = Category::all();
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
        $mensaje = '¡Producto agregado al carrito!';
        return redirect()->route('cart.index')->with(compact('mensaje', 'categories'));
    }

    public function update(Request $request)
    {
        $categories = Category::all();
        \Cart::update(
            $request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
            )
        );
        $mensaje = 'El carrito se actualizó!';
        return redirect()->route('cart.index')->with(compact('mensaje', 'categories'));
    }

    public function clear()
    {
        $categories = Category::all();
        \Cart::clear();
        $mensaje = 'El carrito se vació';
        return redirect()->route('cart.index')->with(compact('mensaje', 'categories'));
    }

    public function checkout()
    {
        $cartCollection = \Cart::getContent();
        $total = 0;

        echo "<pre>";
        print_r($cartCollection);

        foreach($cartCollection as $product){
            
        }

    }
}
