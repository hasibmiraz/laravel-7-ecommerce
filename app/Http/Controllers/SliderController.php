<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{

    public function sliders()
    {
        $sliders = Slider::orderBy('id', 'desc')->get();
        return view('admin.sliders', compact('sliders'));
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
            $fileNameToStore = $fileName . '_' . time() . '.' . $extention;

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

    public function editslider($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.editslider', compact('slider'));
    }

    public function updateslider(Request $request, $id)
    {
        $validate = $request->validate([
            'description_one' => 'required|min:10',
            'description_two' => 'required|min:10',
            'slider_image' => 'max:2024',
        ]);

        $slider = Slider::findOrFail($id);
        $slider->description1 = $request->description_one;
        $slider->description2 = $request->description_two;

        if($request->hasFile('slider_image')) {
            $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extention = $request->file('slider_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extention;

            $path = $request->file('slider_image')->storeAs('public/slider_images', $fileNameToStore);

            $old_image = $slider->slider_image;

            Storage::delete('public/slider_images/'.$old_image);

            $slider->slider_image = $fileNameToStore;
        }

        $slider->update();


        $request->session()->flash('status', 'Slider was updated successfully!');
        return redirect()->route('sliders.show');
    }

    public function deleteslider(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);
        Storage::delete('public/slider_images/'.$slider->slider_image);

        $slider->delete();

        $request->session()->flash('status', 'Slider was deleted successfully!');
        return redirect()->route('sliders.show');
    }

    public function activateslider(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        if($slider->status === 1) {
            $slider->status = 0;
            $slider->update();
            $request->session()->flash('status', 'Slider was deactivated successfully!');
        } elseif($slider->status === 0) {
            $slider->status = 1;
            $slider->update();
            $request->session()->flash('status', 'Slider was activated successfully!');
        }
        return redirect()->route('sliders.show');
    }

}
