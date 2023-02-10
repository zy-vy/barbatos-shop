<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class,'index']);
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [AuthController::class,'login'])->name('login_method');
Route::get('/logout',[AuthController::class,'logout'])->name('logout_user');
Route::get('/register',[AuthController::class,'registerPage']);
Route::post('/register',[AuthController::class,'register']);
Route::get('/category/{name}',[ProductController::class,'category']);

Route::get('/product/{id}',[ProductController::class,'productDetail']);


Route::get('/search',[ProductController::class,'search']);


Route::middleware(['auth'])->group(function(){
    Route::post('/purchase/{id}',[CartController::class,'purchase']);
    Route::get('/cart',[CartController::class,'cartPage']);
    Route::get('/delete_cart/{id}',[CartController::class,'delete']);
    Route::get('/profile',[UserController::class,'profile']);
    Route::get('/history',[UserController::class,'history']);
    Route::get('/checkout',[TransactionController::class,'checkout']);
});

Route::middleware(['auth','authAdmin'])->group(function(){
    Route::get('/admin',[AuthController::class,'adminPage']);
    Route::get('/add_product',[ProductController::class,'addPage']);
    Route::post('/add_product',[ProductController::class,'addProduct']);
    Route::get('/manage',[ProductController::class,'manage']);
    Route::post('/manage',[ProductController::class,'manageProduct']);
    Route::get('/manage/search',[ProductController::class,'searchProduct']);
    Route::get('/edit_product/{id}',[ProductController::class,'edit']);
    Route::post('/edit_product/{id}',[ProductController::class,'editProduct']);
    Route::get('/delete/{id}',[ProductController::class,'delete']);

});