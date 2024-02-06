<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function create()
    {
        return view('admin.unit.create');
    }
    public function index()
    {
        return view('admin.unit.index',['brands'=>Unit::all()]);
    }
    public function store(Request $request)
    {
        Unit::newUnit($request);

        return back()->with('message','unit create Successfully');
        
    }
    public function edit($id)
    {

        return view('admin.unit.edit',['unit'=>Unit::find($id)]);
    }
    public function update(Request $request,$id)
    {
        Unit::updateUnit($request,$id);
        return redirect('/unit/index');
    }
    public function delete(Request $request)
    {
        Unit::deleteBrand($request);
        return redirect('/unit/index')->with('message','delete unit');
    }
}
