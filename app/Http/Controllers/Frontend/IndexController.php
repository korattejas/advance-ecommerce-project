<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Models\multiimg;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function Index()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $featured = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $hot_deals = Product::where('hot_deals', 1)->where('discount_price', '!=', 'NULL')->orderBy('id', 'DESC')->limit(3)->get();
        $special_offers = Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(2)->get();
        $special_deals = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(2)->get();
        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status', 1)->where('category_id', $skip_category_0->id)->orderBy('id', 'DESC')->get();
        $skip_category_1 = Category::skip(1)->first();
        $skip_product_1 = Product::where('status', 1)->where('category_id', $skip_category_1->id)->orderBy('id', 'DESC')->get();
        $skip_brand_1 = Brand::skip(3)->first();
        $skip_brand_product_1 = Product::where('status', 1)->where('brand_id', $skip_brand_1->id)->orderBy('id', 'DESC')->get();
        $tags = Product::groupBy('pro_tag_en')->select('pro_tag_en')->get();

        return view('frontend.index', [
            'categories' => $categories,
            'sliders' => $sliders,
            'products' => $products,
            'featured' => $featured,
            'hot_deals' => $hot_deals,
            'special_offers' => $special_offers,
            'special_deals' => $special_deals,
            'skip_category_0' => $skip_category_0,
            'skip_product_0' => $skip_product_0,
            'skip_category_1' => $skip_category_1,
            'skip_product_1' => $skip_product_1,
            'skip_brand_1' => $skip_brand_1,
            'skip_brand_product_1' => $skip_brand_product_1,
            'tags' => $tags,
        ]);
    }

    public function UserLogout()
    {

        Auth::logout();
        return redirect()->route('login');

    }

    public function UserProfile()
    {

        $id = Auth::User()->id;
        $user = User::find($id);

        return view('frontend.profile.user_profile', [
            'user' => $user
        ]);

    }

    public function UserProfileStore(Request $request)
    {

        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images' . $data->profile_photo_path));
            $file_name = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $file_name);
            $data['profile_photo_path'] = $file_name;
        }
        $data->save();

        $notification = array([
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        ]);
        return redirect()->route('dashboard')->with($notification);

    }

    public function UserChangePassword()
    {
        return view('frontend.profile.change_password');
    }

    //product Details

    public function ProductDetails($id, $slug)
    {
        $product = Product::findOrFail($id);
        $multiImages = multiimg::where('product_id', $id)->get();
        return view('frontend.product.detail', [
            'product' => $product,
            'multiImages' => $multiImages,
        ]);

    }

    //Product View Ajax Modal

    public function ProductViewAjax($id)
    {
        $product = Product::with('category','brand')->findOrFail($id);
        $color = $product->pro_color_en;
        $product_color = explode(',', $color);

        $size = $product->pro_size_en;
        $product_size = explode(',', $size);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size
        ));


    }
}
