<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function create()
    {
        return view('admin.brand.create');
    }
    public function index()
    {
        return view('admin.brand.index',['brands'=>Brand::all()]);
    }
    public function store(Request $request)
    {
        Brand::newBrand($request);

        return back()->with('message','brand create Successfully');
        
    }
    public function edit($id)
    {

        return view('admin.brand.edit',['brand'=>Brand::find($id)]);
    }
    public function update(Request $request)
    {
        Brand::updateBrand($request);
        return redirect('/brand/index');
    }
    public function delete(Request $request)
    {
        Brand::deleteBrand($request);
        return redirect('/brand/index')->with('message','delete Brand');
    }
}
