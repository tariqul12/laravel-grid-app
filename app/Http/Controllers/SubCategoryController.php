<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function create()
    {
        return view('admin.sub-category.create',['categories'=>Category::all()]);
    }
    public function index()
    {
        return view('admin.sub-category.index',['sub_categories'=>SubCategory::all()]);
    }
    public function store(Request $request)
    {
        SubCategory::NewSubCategory($request);
        return redirect('sub-category/create')->with('message','Sub Category Create Successfully');
    }
    public function edit($id)
    {
        return view('admin.sub-category.edit',['sub_category'=>SubCategory::find($id)]);
    }
    public function update(Request $request)
    {
        SubCategory::updateCategory($request);
        return redirect('/sub-category/index');
    }
    public function delete($id)
    {
        SubCategory::deleteSubCategory($id);
        return redirect('/sub-category/index')->with('message','delete Sub Category');
    }
}
