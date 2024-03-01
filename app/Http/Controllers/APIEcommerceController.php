<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class APIEcommerceController extends Controller
{
    public function products() {
        //$products = Product::all();
        $products = Product::with("category")->get();
        return response()->json($products);
    }

    public function products_dt(Request $request) {
        $categoryId = $request->input('category_id');

        $query = Product::with('category');

        if (!is_null($categoryId)) {
            $query = $query->where('category_id', $categoryId);
        }

        $products = $query->get();

        return response()->json(["data" => $products]);
    }


    public function categories(Request $request) {
        $term = $request->input("term");
        $categories = is_null($term) ?
            Category::select('id', 'name as name')->get() :
            Category::where('name', 'LIKE', '%' . $term . '%')->select('id', 'name as name')->get();
        return response()->json($categories);
    }

}