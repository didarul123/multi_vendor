<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Prosubcategory;

class ProsubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prosubcategories = Prosubcategory::simplepaginate(20);
        return view('backend.admin.prosubcategory.index', compact('prosubcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        $subcategories = Subcategory::where('status', 1)->get();
        return view('backend.admin.prosubcategory.create', compact('categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:prosubcategories',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'status' => 'required',
        ]);

        $prosubcategory = new Prosubcategory();
        $prosubcategory->name = $request->name;
        $prosubcategory->category_id = $request->category_id;
        $prosubcategory->subcategory_id = $request->subcategory_id;
        $prosubcategory->status = $request->status;
        $prosubcategory->save();
        $notification=array(
            'message' => 'Prosubcategory Saved Successfully !!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $prosubcategory = Prosubcategory::findorfail($id);
        return view('backend.admin.prosubcategory.edit', compact('prosubcategory', 'subcategories', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prosubcategory = Prosubcategory::findorfail($id);
        $prosubcategory->name = $request->name;
        $prosubcategory->category_id = $request->category_id;
        $prosubcategory->subcategory_id = $request->subcategory_id;
        $prosubcategory->status = $request->status;
        $prosubcategory->save();
        $notification=array(
            'message' => 'Prosubcategory Updated Successfully !!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prosubcategory = Prosubcategory::findorfail($id);
        $prosubcategory->delete();
        $notification=array(
            'message' => 'ProSubCategory Deleted Successfully !!',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function get_subcategory(Request $request){
        $subcategories = Category::where('parent_id', $request->category_id)->get();
        return view('backend.admin.prosubcategory.get_subcategory',compact('subcategories'));
    }

}
