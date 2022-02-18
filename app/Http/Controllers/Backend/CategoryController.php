<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Image;

class CategoryController extends Controller
{
    public function CategoryView()
    {
        $category = Category::latest()->get();
        return view('backend.category.category_view', [
            'category' => $category
        ]);
    }

    public function CategoryAdd()
    {
        return view('backend.category.category_add');
    }

    public function CategoryStore(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required',
            'category_name_hin' => 'required',
            'category_icon' => 'required',

        ]);

        $category = new Category();
        $category->category_name_en = $request->category_name_en;
        $category->category_name_hin = $request->category_name_hin;
        $category->category_slug_en = strtolower(str_replace(' ', '-', $request->category_name_en));
        $category->category_slug_hin = strtolower(str_replace(' ', '-', $request->category_name_hin));
        $category->category_icon = $request->category_icon;
        $category->save();


        $notification = array([
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        ]);

        return redirect()->route('all.category')->with($notification);
    }

    public function CategoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', [
            'category' => $category
        ]);
    }

    public function CategoryUpdate(Request $request)
    {
        $id = $request->id;

        $category = Category::findOrFail($id);
        $category->category_name_en = $request->category_name_en;
        $category->category_name_hin = $request->category_name_hin;
        $category->category_slug_en = strtolower(str_replace(' ', '-', $request->category_name_en));
        $category->category_slug_hin = strtolower(str_replace(' ', '-', $request->category_name_hin));
        $category->category_icon = $request->category_icon;
        $category->save();

        $notification = array([
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        ]);

        return redirect()->route('all.category')->with($notification);

    }

    public function CategoryDelete($id)
    {
        Category::find($id)->delete();
        $notification = array([
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        ]);
        return redirect()->back()->with($notification);
    }


}
