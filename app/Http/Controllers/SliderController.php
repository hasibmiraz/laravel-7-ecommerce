<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function sliders()
    {
        return view('admin.sliders');
    }

    public function addslider()
    {
        return view('admin.addslider');
    }

    public function saveslider(Request $request)
    {
        $validate = $request->validate([
            'description_one' => 'required|min:10',
            'description_two' => 'required|min:10',
            'slider_image' => 'required|max:2024',
        ]);

        if($request->hasFile('slider_image')) {
            $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extention = $request->file('slider_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '_' . $extention;

            $path = $request->file('slider_image')->storeAs('public/slider_images', $fileNameToStore);
        }

        $slider = new Slider();
        $slider->description1 = $request->description_one;
        $slider->description2 = $request->description_two;
        $slider->slider_image = $fileNameToStore;
        $slider->status = 0;

        $slider->save();

        $request->session()->flash('status', 'Slider was created successfully!');
        return redirect()->route('sliders.show');
    }

}
