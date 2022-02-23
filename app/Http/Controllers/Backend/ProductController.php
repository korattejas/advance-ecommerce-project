<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\MultiImg;
use Carbon\Carbon;
use Image;


class ProductController extends Controller
{
    public function ProductView()
    {
        $product = Product::latest()->get();
        return view('backend.product.product_view', [
            'product' => $product
        ]);
    }

    public function ProductAdd()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add', [
            'categories' => $categories,
            'brands' => $brands,
        ]);

    }

    public function GetSubSubCategory($sub_category_id)
    {
        $subcat = SubSubCategory::where('sub_category_id', $sub_category_id)->orderBy('sub_sub_category_name_en', 'ASC')->get();
        return json_encode($subcat);
    }

    public function ProductStore(Request $request)
    {
        $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'sub_sub_category_id' => 'required',
            'pro_name_en' => 'required',
            'pro_name_hin' => 'required',
            'pro_code' => 'required',
            'pro_qty' => 'required',
            'pro_tag_en' => 'required',
            'pro_tag_hin' => 'required',
            'pro_size_en' => 'required',
            'pro_size_hin' => 'required',
            'pro_color_en' => 'required',
            'pro_color_hin' => 'required',
            'image' => 'required',
            'selling_price' => 'required',
            'discount_price' => 'required',
            'short_des_en' => 'required',
            'short_des_hin' => 'required',
            'long_des_en' => 'required',
            'long_des_hin' => 'required',

        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/product_image/' . $name_gen);
        $save_url = 'upload/product_image/' . $name_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'sub_sub_category_id' => $request->sub_sub_category_id,
            'pro_name_en' => $request->pro_name_en,
            'pro_name_hin' => $request->pro_name_hin,
            'pro_slug_en' => strtolower(str_replace(' ', '-', $request->pro_slug_en)),
            'pro_slug_hin' => str_replace(' ', '-', $request->pro_slug_hin),
            'pro_code' => $request->pro_code,

            'pro_qty' => $request->pro_qty,
            'pro_tag_en' => $request->pro_tag_en,
            'pro_tag_hin' => $request->pro_tag_hin,
            'pro_size_en' => $request->pro_size_en,
            'pro_size_hin' => $request->pro_size_hin,
            'pro_color_en' => $request->pro_color_en,
            'pro_color_hin' => $request->pro_color_hin,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_des_en' => $request->short_des_en,
            'short_des_hin' => $request->short_des_hin,
            'long_des_en' => $request->long_des_en,
            'long_des_hin' => $request->long_des_hin,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_price' => $request->special_price,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'image' => $save_url,
            'created_at' => Carbon::now(),

        ]);

        //multi image
        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/multi_images/' . $make_name);
            $uploadPath = 'upload/multi_images/' . $make_name;

            $multi_img = new MultiImg();
            $multi_img->product_id = $product_id;
            $multi_img->multi_img = $uploadPath;
            $multi_img->save();

        }
        $notification = array([
            'message' => 'Product Added Successfully',
            'alert-type' => 'success'
        ]);

        return redirect()->route('all.product')->with($notification);

    }

    public function productEdit($id)
    {
        $multiImgs = MultiImg::where('product_id', $id)->get();
        $categories = Category::latest()->get();
        $sub_category = SubCategory::latest()->get();
        $sub_sub_category = SubSubCategory::latest()->get();
        $brands = Brand::latest()->get();
        $product = Product::findOrFail($id);
        {
            return view('backend.product.product_edit', [
                'multiImgs' => $multiImgs,
                'categories' => $categories,
                'sub_category' => $sub_category,
                'sub_sub_category' => $sub_sub_category,
                'brands' => $brands,
                'product' => $product
            ]);
        }
    }

    public function productUpdate(Request $request)
    {
        $product_id = $request->id;
        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'sub_sub_category_id' => $request->sub_sub_category_id,
            'pro_name_en' => $request->pro_name_en,
            'pro_name_hin' => $request->pro_name_hin,
            'pro_slug_en' => strtolower(str_replace(' ', '-', $request->pro_slug_en)),
            'pro_slug_hin' => str_replace(' ', '-', $request->pro_slug_hin),
            'pro_code' => $request->pro_code,

            'pro_qty' => $request->pro_qty,
            'pro_tag_en' => $request->pro_tag_en,
            'pro_tag_hin' => $request->pro_tag_hin,
            'pro_size_en' => $request->pro_size_en,
            'pro_size_hin' => $request->pro_size_hin,
            'pro_color_en' => $request->pro_color_en,
            'pro_color_hin' => $request->pro_color_hin,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_des_en' => $request->short_des_en,
            'short_des_hin' => $request->short_des_hin,
            'long_des_en' => $request->long_des_en,
            'long_des_hin' => $request->long_des_hin,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_price' => $request->special_price,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

//            'image' => $save_url,
            'created_at' => Carbon::now(),

        ]);
        $notification = array([
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        ]);

        return redirect()->route('all.product')->with($notification);
    }

    public function productImageUpdate(Request $request)
    {
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->multi_img);
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/multi_images/' . $make_name);
            $uploadPath = 'upload/multi_images/' . $make_name;

            MultiImg::where('id', $id)->update([
                'multi_img' => $uploadPath,
                'updated_at' => Carbon::now(),
            ]);

        }

        $notification = array([
            'message' => 'Product MultiImage Updated Successfully',
            'alert-type' => 'success'
        ]);

        return redirect()->back()->with($notification);

    }

    public function productMainImageUpdate(Request $request)
    {
        $pro_id = $request->id;
        $oldImg = $request->old_img;
        unlink($oldImg);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/product_image/' . $name_gen);
        $save_url = 'upload/product_image/' . $name_gen;

        Product::findOrFail($pro_id)->update([
            'image' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array([
            'message' => 'Product Image Updated Successfully',
            'alert-type' => 'success'
        ]);

        return redirect()->back()->with($notification);


    }

    public function multiImgDelete($id)
    {
        $oldImg = MultiImg::findOrFail($id);
        unlink($oldImg->multi_img);
        MultiImg::findOrFail($id)->delete();

        $notification = array([
            'message' => 'Product MultiImage Updated Successfully',
            'alert-type' => 'success'
        ]);

        return redirect()->back()->with($notification);

    }



    public function productDelete($id)
    {
        Product::find($id)->delete();

        $notification = array([
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        ]);

        return redirect()->route('all.product')->with($notification);
    }
}
