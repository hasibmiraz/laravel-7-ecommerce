<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products()
    {
        return view('admin.products');
    }    

    public function addproduct()
    {
        $categories = Category::orderBy('category_name', 'asc')->pluck('category_name', 'category_name');
        return view('admin.addproduct', compact('categories'));
    }

    public function saveproduct(Request $request)
    {
        if($request->product_category) {
            $validate = $request->validate([
                'product_name' => 'required|min:6',
                'product_price' => 'required',
                'product_image' => 'image|nullable|max:2024',
            ]);
    
            if($request->hasFile('product_image')) {
                $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extention = $request->file('product_image')->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '_' . $extention;
    
                $path = $request->file('product_image')->storeAs('public/product_images', $fileNameToStore);
            } else {
                $fileNameToStore = 'noimage.jpg';
            }
    
            $product = new Product();
            $product->product_name = $request->product_name;
            $product->product_price = $request->product_price;
            $product->product_category = $request->product_category;
            $product->product_image = $fileNameToStore;
            $product->status = 1;
    
            $product->save();
    
            $request->session()->flash('status', 'Product was created successfully!');
            return redirect()->route('products.show');
        } else {
            $request->session()->flash('status', 'Please select the product category!');
            return redirect()->route('product.create');
        }


    }
}
