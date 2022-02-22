<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;


class ProductController extends Controller
{
    public function ProductView()
    {
        $product = Product::latest()->get();
        return view('backend.product.product_view',[
            'product' => $product
        ]);
    }

    public function ProductAdd()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add',[
            'categories' => $categories,
            'brands' => $brands,
        ]);

    }
}
