<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    public function BrandView()
    {
     $brands = Brand::latest()->get();
     return view('backend.brand.brand_view',[
     'brands' => $brands,
     ]);
    }

     public function BrandAdd()
     {
     return view('backend.brand.brand_add');
     }

     public function BrandStore(Request $request)
     {

     $request->validate([
     'brand_name_en' => 'required',
     'brand_name_hin' =>'required',
     'brand_image' => 'required',

     ]);

     $image = $request->file('brand_image');
     $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
     Image::make($image)->resize(300,300)->save('upload/brand_images/'.$name_gen);
     $save_url = 'upload/brand_images/'.$name_gen;

      $brand = new Brand();
      $brand->brand_name_en = $request->brand_name_en;
      $brand->brand_name_hin = $request->brand_name_hin;
      $brand->brand_slug_en = strtolower(str_replace(' ','-',$request->brand_name_en));
      $brand->brand_slug_hin = strtolower(str_replace(' ','-',$request->brand_name_hin));
      $brand->brand_image = $save_url;
      $brand->save();

        $notification = array([
           'message' => 'Brand Added Successfully',
           'alert-type' => 'success'
           ]);

      return redirect()->route('all.brand')->with($notification);

     }

     public function BrandEdit($id)
     {

     $brand = Brand::findOrFail($id);
     return view('backend.brand.brand_edit',[
     'brand' => $brand

     ]);

     }

     public function BrandUpdate(Request $request)
     {
            $id = $request->id;
            $old_image = $request->old_image;

           if($request->file('brand_image'))
           {
            unlink($old_image);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/brand_images/'.$name_gen);
            $save_url = 'upload/brand_images/'.$name_gen;

            $brand = Brand::find($id);
            $brand->brand_name_en = $request->brand_name_en;
            $brand->brand_name_hin = $request->brand_name_hin;
            $brand->brand_slug_en = strtolower(str_replace(' ','-',$request->brand_name_en));
            $brand->brand_slug_hin = strtolower(str_replace(' ','-',$request->brand_name_hin));
            $brand->brand_image =$save_url;
            $brand->save();

            $notification = array([
               'message' => 'Brand Updated Successfully',
               'alert-type' => 'success'
               ]);

           return redirect()->route('all.brand')->with($notification);
           }
           else
           {
            $brand = Brand::find($id);
            $brand->brand_name_en = $request->brand_name_en;
            $brand->brand_name_hin = $request->brand_name_hin;
            $brand->brand_slug_en = strtolower(str_replace(' ','-',$request->brand_name_en));
            $brand->brand_slug_hin = strtolower(str_replace(' ','-',$request->brand_name_hin));
            $brand->save();

            $notification = array([
                 'message' => 'Brand Updated Successfully',
                 'alert-type' => 'success'
             ]);

            return redirect()->route('all.brand')->with($notification);
           }
     }

     public function BrandDelete($id)
     {
      $brand = Brand::findOrFail($id);
      $img = $brand->brand_image;
      unlink($img);
      Brand::find($id)->delete();
      $notification = array([
                       'message' => 'Brand Deleted Successfully',
                       'alert-type' => 'success'
                   ]);
      return redirect()->back()->with($notification);
     }

}
