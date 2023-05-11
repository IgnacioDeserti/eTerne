<?php

use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoryController;
use App\Mail\ContactanosMailable;
use App\Models\ImageProducts;
use App\Models\Product;
use App\Models\User;
use App\Models\VideoProducts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CartController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\GoogleController;
use Google\Client as GoogleClient;


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

Route::get('/google-auth/redirect', function(){
    return Socialite::driver('google')->redirect();
});

Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

Route::get('/connect-to-google-drive', [GoogleController::class, 'connectToGoogleDrive']);

Route::get('/google-drive-callback', function() {
    $googleClient = new GoogleClient();
    $googleClient->setClientId(env('GOOGLE_CLIENT_ID'));
    $googleClient->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
    $googleClient->setRedirectUri(env('GOOGLE_REDIRECT'));
    $googleClient->authenticate(request()->get('code'));
    session()->put('google_token', $googleClient->getAccessToken());
    return redirect('/connect-to-google-drive');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('role:admin')->name('dashboard');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::resource('productos', ProductoController::class)->middleware('role:admin');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::resource('categories', CategoryController::class)->middleware('role:admin');
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

            return compact('producto', 'photos', 'videos');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {    
    Route::post('/add', [CartController::class, 'add'])->name('cart.store');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::post('/update', [CartController::class, 'update'])->name('cart.update');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');
});

