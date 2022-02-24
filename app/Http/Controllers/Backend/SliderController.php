<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Slider;
use Image;

class SliderController extends Controller
{
    public function sliderView()
    {
        $slider = Slider::latest()->get();
        return view('backend.slider.index', [
            'slider' => $slider
        ]);
    }

    public function SliderAdd()
    {
        return view('backend.slider.create');

    }

    public function sliderStore(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'image' => 'required',

        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('upload/slider_images/' . $name_gen);
        $save_url = 'upload/slider_images/' . $name_gen;

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->image = $save_url;
        $slider->save();

        $notification = array([
            'message' => 'Slider Added Successfully',
            'alert-type' => 'success'
        ]);

        return redirect()->route('all.slider')->with($notification);
    }

    public function SliderEdit($id)
    {
        $slider = Slider::findOrFail($id);
        {
            return view('backend.slider.edit', [
                'slider' => $slider
            ]);

        }
    }

    public function SliderUpdate(Request $request)
    {
        $id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('image')) {
            unlink($old_image);

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(870, 370)->save('upload/slider_images/' . $name_gen);
            $save_url = 'upload/slider_images/' . $name_gen;

            Slider::findOrFail($id)->update([
                'title' => $request->title,
                'image' => $save_url,
                'description' => $request->description,
            ]);


            $notification = array([
                    'message' => 'Slider Updated Successfully',
                    'alert-type' => 'success'
                ]);

            return redirect()->route('all.slider')->with($notification);

        } else {

            Slider::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,

            ]);
            $notification = array([
                'message' => 'Slider Updated Successfully',
                'alert-type' => 'success'
            ]);

            return redirect()->route('all.slider')->with($notification);
        }

    }

    public function SliderDelete($id)
    {
        $slider = Slider::findOrFail($id);
        $img = $slider->image;
        unlink($img);
        Slider::find($id)->delete();

        $notification = array([
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'success'
        ]);

        return redirect()->back()->with($notification);
    }

    //status

    public function SliderInActive($id)
    {
        Slider::findOrFail($id)->update(['status' => 0]);

        $notification = array([
            'message' => 'Slider Status Active Successfully',
            'alert-type' => 'success'
        ]);

        return redirect()->back()->with($notification);

    }

    public function SliderActive($id)
    {
        Slider::findOrFail($id)->update(['status' => 1]);

        $notification = array([
            'message' => 'Slider Status InActive Successfully',
            'alert-type' => 'success'
        ]);
        return redirect()->back()->with($notification);

    }
}
