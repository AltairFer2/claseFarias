<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use App\Mail\CommentPosted;
use Illuminate\Support\Facades\Mail;


class GroceriesCotroller extends Controller
{
    public function index(){
        /*
        print_r($products);
        die();
        */

        return view("groceries.index");
    }
    public function shop(Request $request){
        $products = Product::all();
        $categories = Category::all();
        return view("groceries.shop", compact('products', 'categories'));
    }
    public function register(){
        return view("groceries.register");
    }
    public function login(){
        return view("groceries.login");
    }
    public function detail(Request $request){
        $product = Product::find($request->product_id);
        $products = Product::all();
        return view("groceries.detail-product", compact("product","products"));
    }
    public function contact(){
        return view("groceries.contact");
    }

    // Dentro del método show() u otro relevante en tu controlador de productos

    public function store(Request $request, $productId)
{
    $comment = new Comment();
    $comment->content = $request->input('content');
    $comment->product_id = $productId;
    // Asume que tienes una forma de capturar el correo del usuario o lo tienes en la sesión
    $comment->email = $request->input('email');
    $comment->save();

    // Enviar correo electrónico
    Mail::to('20031003@itcelaya.edu.mx')->send(new CommentPosted($comment));

    return back()->with('success', 'Comment added and emailed successfully!');
}

}