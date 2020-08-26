<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home()
    {
        $products = Product::where('status', '1')->get();
        $sliders = Slider::get();
        return view('client.home',compact('sliders', 'products'));
    }


    public function shop()
    {
        $categories = Category::get();
        $products = Product::where('status', '1')->get();
        return view('client.shop',compact('products', 'categories'));
    }

    public function cart()
    {
        return view('client.cart');
    }

    public function checkout()
    {
        return view('client.checkout');
    }

    public function login()
    {
        return view('client.login');
    }

    public function signup()
    {
        return view('client.signup');
    }
}
