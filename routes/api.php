<?php

use App\Http\Controllers\APIEcommerceController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/products", [APIEcommerceController::class , 'products'])->name("api.products");
Route::get("/products_dt", [APIEcommerceController::class ,"products_dt"])->name("api.products_dt");
Route::get('/categories', [APIEcommerceController::class, 'categories'])->name('api.categories');