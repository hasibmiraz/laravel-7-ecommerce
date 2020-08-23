<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function addcategory()
    {
        return view('admin.addcategory');
    }

    public function addproduct()
    {
        return view('admin.addproduct');
    }

    public function addslider()
    {
        return view('admin.addslider');
    }
}
