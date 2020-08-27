<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;

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
        if(!Session::has('cart')){
            return view('client.cart');
        }

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        return view('client.cart', ['products' => $cart->items]);
    }
    
    public function updateqty(Request $request, $id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->updateQty($request->id, $request->quantity);
        Session::put('cart', $cart);

        return redirect()->route('cart');    
    }

    public function removeitem($id)
    {
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
       
        if(count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('cart');
    }

    public function postcheckout(Request $request)
    {
        if(!Session::has('cart')) {
            return redirect()->route('cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        Stripe::setApiKey('pk_test_51HKSn8DFGxRHaLyPONFFEXxbDq8c4DRyyq4Afb9HU2zTad8WrzCBdC1xc8JedAqsp5waMJUVRpO5Xxc7xp7o9XsZ00nd4exOAM');

        try{
            Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtainded with Stripe.js
                "description" => "Test Charge"
            ));
        } catch(\Exception $e) {
            Session::put('error', $e->getMessage());
            return redirect()->route('product.checkout');
        }

        Session::forget('cart');
        Session::put('success', 'Purchase accomplished successfully!');
        return redirect()->route('home');
    }

    public function checkout()
    {
        if(!Session::has('cart')) {
            return redirect()->route('cart');
        }
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
