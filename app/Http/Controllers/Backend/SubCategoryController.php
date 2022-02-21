<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        $sub_category = SubCategory::latest()->get();
        return view('backend.category.sub_category_view', [
            'sub_category' => $sub_category
        ]);
    }

    public function SubCategoryAdd()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        return view('backend.category.sub_category_add', [
            'categories' => $categories
        ]);
    }

    public function SubCategoryStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_hin' => 'required',

        ], [
            'category_id.required' => 'Please Select Category',
        ]);

        $category = new SubCategory();
        $category->category_id = $request->category_id;
        $category->subcategory_name_en = $request->subcategory_name_en;
        $category->subcategory_name_hin = $request->subcategory_name_hin;
        $category->subcategory_slug_en = strtolower(str_replace(' ', '-', $request->subcategory_slug_en));
        $category->subcategory_slug_hin = strtolower(str_replace(' ', '-', $request->subcategory_slug_hin));
        $category->save();


        $notification = array([
            'message' => 'Sub Category Added Successfully',
            'alert-type' => 'success'
        ]);

        return redirect()->route('all.subcategory')->with($notification);

    }

    public function SubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $sub_category = SubCategory::findOrFail($id);
        return view('backend.category.sub_category_edit', [
            'categories' => $categories,
            'sub_category' => $sub_category,
        ]);
    }

    public function SubCategoryUpdate(Request $request)
    {
        $id = $request->id;

        $category = SubCategory::findOrFail($id);
        $category->category_id = $request->category_id;
        $category->subcategory_name_en = $request->subcategory_name_en;
        $category->subcategory_name_hin = $request->subcategory_name_hin;
        $category->subcategory_slug_en = strtolower(str_replace(' ', '-', $request->subcategory_slug_en));
        $category->subcategory_slug_hin = strtolower(str_replace(' ', '-', $request->subcategory_slug_hin));
        $category->save();

        $notification = array([
            'message' => 'Sub Category Updated Successfully',
            'alert-type' => 'success'
        ]);

        return redirect()->route('all.subcategory')->with($notification);
    }

    public function SubCategoryDelete($id)
    {
        SubCategory::find($id)->delete($id);
        $notification = array([
            'message' => 'Sub Category Deleted Successfully',
            'alert-type' => 'success'
        ]);
        return redirect()->back()->with($notification);
    }

    //sub sub-category

    public function SubSubCategoryView()
    {
        $sub_sub_category = SubSubCategory::latest()->get();
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('backend.category.sub_sub_category_view', [
            'sub_sub_category' => $sub_sub_category,
            'categories' => $categories
        ]);
    }

    public function GetSubCategory($category_id)
    {
        $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_en', 'ASC')->get();
        return json_encode($subcat);

    }

    public function SubSubCategoryAdd()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        return view('backend.category.sub_sub_category_add', [
            'categories' => $categories
        ]);

    }

    public function SubSubCategoryStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'sub_sub_category_name_en' => 'required',
            'sub_sub_category_name_hin' => 'required',

        ], [
            'category_id.required' => 'Please Select Category',
            'sub_category_id.required' => 'Please Select Sub Category'
        ]);

        $category = new SubSubCategory();
        $category->category_id = $request->category_id;
        $category->sub_category_id = $request->sub_category_id;
        $category->sub_sub_category_name_en = $request->sub_sub_category_name_en;
        $category->sub_sub_category_name_hin = $request->sub_sub_category_name_hin;
        $category->sub_sub_category_slug_en = strtolower(str_replace(' ', '-', $request->sub_sub_category_slug_en));
        $category->sub_sub_category_slug_hin = strtolower(str_replace(' ', '-', $request->sub_sub_category_slug_hin));
        $category->save();


        $notification = array([
            'message' => 'Sub SubCategory Added Successfully',
            'alert-type' => 'success'
        ]);

        return redirect()->route('all.sub_subcategory')->with($notification);

    }

    public function SubSubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $sub_category = SubCategory::orderBy('subcategory_name_en', 'ASC')->get();
        $sub_sub_category = SubSubCategory::findOrFail($id);
        return view('backend.category.sub_sub_category_edit', [
            'categories' => $categories,
            'sub_category' => $sub_category,
            'sub_sub_category' => $sub_sub_category
        ]);

    }

    public function SubSubCategoryUpdate(Request $request)
    {
        $id = $request->id;

        $category = SubSubCategory::findOrFail($id);
        $category->category_id = $request->category_id;
        $category->sub_category_id = $request->sub_category_id;
        $category->sub_sub_category_name_en = $request->sub_sub_category_name_en;
        $category->sub_sub_category_name_hin = $request->sub_sub_category_name_hin;
        $category->sub_sub_category_slug_en = strtolower(str_replace(' ', '-', $request->sub_sub_category_slug_en));
        $category->sub_sub_category_slug_hin = strtolower(str_replace(' ', '-', $request->sub_sub_category_slug_hin));
        $category->save();

        $notification = array([
            'message' => 'Sub SubCategory Updated Successfully',
            'alert-type' => 'success'
        ]);

        return redirect()->route('all.sub_subcategory')->with($notification);

    }

    public function SubSubCategoryDelete($id)
    {
        SubSubCategory::find($id)->delete($id);
        $notification = array([
            'message' => 'Sub SubCategory Deleted Successfully',
            'alert-type' => 'success'
        ]);
        return redirect()->back()->with($notification);

    }
}
