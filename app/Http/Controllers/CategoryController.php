<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addcategory()
    {
        return view('admin.addcategory');
    }

    public function categories()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.categories', compact('categories'));
    }

    public function savecategory(Request $request)
    {
        $checkCat = Category::where('category_name', $request->category_name)->first();

        $category = new Category();
        
        if (!$checkCat) {
            $validate = $request->validate([
                'category_name' => 'required|min:3|max:10'
            ]);
            
            $category->category_name = $request->category_name;
            $category->save();
            $request->session()->flash('status', 'Category was created!');
            return redirect()->route('categories.show');
        } else {
            $request->session()->flash('status', 'This category already exists');
            return redirect()->route('category.create');
        }
    }

    public function editcategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.editcategory', compact('category'));
    }

    public function updatecategory(Request $request, $id)
    {
        $checkCat = Category::where('category_name', $request->category_name)->first();
        $category = Category::findOrFail($id);
        $oldcat = $category->category_name;
        
        if (!$checkCat) {
            $validate = $request->validate([
                'category_name' => 'required|min:3|max:10'
                ]);
                
            $category->category_name = $request->category_name;
            $data = [];
            $data['product_category'] = $request->category_name;
            $product = Product::where('product_category', $oldcat)
                            ->update($data);
            $category->update();
            
            $request->session()->flash('status', 'Category was updated!');
            return redirect()->route('categories.show');
        } else {
            $request->session()->flash('status', 'This category already exists');
            return redirect()->route('category.edit');
        }
        
    }

    public function deletecategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        $request->session()->flash('status', 'Category was deleted!');

        return redirect()->route('categories.show');
    }

    public function cateview($name)
    {
        $categories = Category::get();
        $products = Product::where('product_category', $name)->get();

        return view('client.shop',compact('products', 'categories'));
    }
}
