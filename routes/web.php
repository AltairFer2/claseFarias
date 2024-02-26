<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\GroceriesCotroller;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|


Route::get('/', [SiteController::class, 'index'])->name("home");
Route::get('/servicios', [SiteController::class, 'services'])->name("services");
Route::get('/productos', [SiteController::class, 'products'])->name("products");
Route::get('/contacto', [SiteController::class, 'contact'])->name("contact");
/*
Route::get('/', function () {
    return view('welcome');
});



Route::get('/greeting', function () {
    return '<h1>Hello World</h1>';
});

Route::get('/user/{id}', function (string $id) {
    return '<h1>Hola '.$id.'</h1>';
});

Route::get('/user/{name?}', function (?string $name = null) {
    return '<h1>Hola bebesito '.$name.'</h1>';
});

Route::get('/user/{name?}', function (?string $name = 'John') {
    return '<h1>Hola bebesito '.$name.'</h1>';
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

*/
Route::get('/', [GroceriesCotroller::class, 'index'])->name("home");
Route::get('/shop', [GroceriesCotroller::class, 'shop'])->name("shop");
Route::get('/register', [GroceriesCotroller::class, 'register'])->name("register");
Route::get('/login', [GroceriesCotroller::class, 'login'])->name("login");
Route::get('/detail', [GroceriesCotroller::class, 'detail'])->name("detail");
Route::resource('contact', ContactController::class);
Route::post('/comments/store', [CommentController::class, 'store'])->name('comment.store');

require __DIR__ . '/auth.php';
