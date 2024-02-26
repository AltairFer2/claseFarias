<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $Welcome_msg = "Welcome to the jungle....";
        $var2="Valor 2";
        $var3="Valor 3";
        return view('index',compact('Welcome_msg','var2','var3'));
    }

    public function services()
    {
        return view('services');
    }


    public function products()
    {
        return view('products');
    }

    public function contact()
    {
        return view('contact');
    }
}
