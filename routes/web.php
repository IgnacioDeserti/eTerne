<?php

use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoryController;
use App\Mail\ContactanosMailable;
use App\Models\ImageProducts;
use App\Models\Product;
use App\Models\VideoProducts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\ClientController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::resource('productos', ProductoController::class);
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::resource('categories', CategoryController::class);
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::resource('user', ClientController::class);
});

Route::get('contactanos', [ContactanosController::class, 'index'])->name('contactanos.index');

Route::post('contactanos', [ContactanosController::class, 'store'])->name('contactanos.store');

Route::get('/productosReact', function() {
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    $productos = Product::all();
    $imagenes = [];
    $aux = new ImageProducts;

    foreach($productos as $product){
        $imagen = DB::table('image_products')
            ->select('image_products.url', 'products.id')
            ->join('products', 'image_products.product_id', '=', 'products.id')
            ->where('image_products.product_id', "=", $product->getAttribute('id'))
            ->limit(1)
            ->get();

            $aux->setAttribute('url', $imagen[0]->url);
            $aux->setAttribute('product_id', $imagen[0]->id);

            array_push($imagenes, $aux->getAttributes());
        }

    // Devolver los datos como un objeto JSON
    return response()->json([
        'productos' => $productos,
        'images' => $imagenes
    ]);
});

Route::get('/clientShow/{id}', function($id){
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    $photo = new ImageProducts;
    $video = new VideoProducts;
    $photos = [];
    $videos = [];
        $producto = Product::findOrFail($id);

        $aux = DB::table('image_products')
            ->select('image_products.url', 'products.id')
            ->join('products', 'image_products.product_id', '=', 'products.id')
            ->where('image_products.product_id', "=", $id)
            ->get();

            foreach($aux as $a){
                $photo->url = $a->url;
                $photo->product_id = $a->id;

                array_push($photos, $photo->getAttributes());
            }

            $aux2 = DB::table('video_products')
            ->select('video_products.url', 'products.id')
            ->join('products', 'video_products.product_id', '=', 'products.id')
            ->where('video_products.product_id', "=", $id)
            ->get();

            foreach($aux2 as $a){
                $video->url = $a->url;
                $video->product_id = $a->id;

                array_push($videos, $video->getAttributes());
            }            

            return view('client.exhibition', compact('producto', 'photos', 'videos'));
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
