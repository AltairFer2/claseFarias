<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class APIEcommerceController extends Controller
{
    public function products() {
        //$products = Product::all();
        $products = Product::with("category")->get();
        return response()->json($products);
    }
}