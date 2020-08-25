<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('admin.products', compact('products'));
    }    

    public function addproduct()
    {
        $categories = Category::orderBy('category_name', 'asc')->pluck('category_name', 'category_name');
        return view('admin.addproduct', compact('categories'));
    }

    public function saveproduct(Request $request)
    {
        $validate = $request->validate([
            'product_name' => 'required|min:3',
            'product_price' => 'required',
            'product_image' => 'required|max:2024',
        ]);

        if($request->product_category) {
            if($request->hasFile('product_image')) {
                $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extention = $request->file('product_image')->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $extention;
    
                $path = $request->file('product_image')->storeAs('public/product_images', $fileNameToStore);
            } else {
                $fileNameToStore = 'noimage.jpg';
            }
    
            $product = new Product();
            $product->product_name = $request->product_name;
            $product->product_price = $request->product_price;
            $product->product_category = $request->product_category;
            $product->product_image = $fileNameToStore;
            $product->status = 0;
    
            $product->save();
    
            $request->session()->flash('status', 'Product was created successfully!');
            return redirect()->route('products.show');
        } else {
            $request->session()->flash('status', 'Please select the product category!');
            return redirect()->route('product.create');
        }
    }

    public function editproduct($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::orderBy('category_name', 'asc')->pluck('category_name', 'category_name');
        return view('admin.editproduct', compact('product', 'categories'));
    }

    public function updateproduct(Request $request, $id)
    {
        $validate = $request->validate([
            'product_name' => 'required|min:6',
            'product_price' => 'required',
            'product_image' => 'max:2024',
        ]);

        if($request->product_category) {
            $product = Product::findOrFail($id);
            $product->product_name = $request->product_name;
            $product->product_price = $request->product_price;
            $product->product_category = $request->product_category;
    
            if($request->hasFile('product_image')) {
                $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extention = $request->file('product_image')->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $extention;
    
                $path = $request->file('product_image')->storeAs('public/product_images', $fileNameToStore);

                $old_image = $product->product_image;

                if ($old_image !== 'noimage.jpg') {
                    Storage::delete('public/product_images/'.$old_image);
                }

                $product->product_image = $fileNameToStore;
            }
    
            $product->update();
    
            $request->session()->flash('status', 'Product was updated successfully!');
            return redirect()->route('products.show');
        } else {
            $request->session()->flash('status', 'Please select the product category!');
            return redirect()->route('product.edit');
        }
    }

    public function deleteproduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->product_image !== 'noimage.jpg') {
            Storage::delete('public/product_images/'.$product->product_image);
        }

        $product->delete();

        $request->session()->flash('status', 'Product was deleted successfully!');
        return redirect()->route('products.show');
    }

    public function activateproduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if($product->status === 1) {
            $product->status = 0;
            $product->update();
            $request->session()->flash('status', 'Product was deactivated successfully!');
        } elseif($product->status === 0) {
            $product->status = 1;
            $product->update();
            $request->session()->flash('status', 'Product was activated successfully!');
        }
        return redirect()->route('products.show');
    }

}
