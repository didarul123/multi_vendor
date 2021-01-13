<?php

namespace App\Http\Controllers\importer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Attribute_value;
use Str;
use Auth;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $user_type = Auth::user()->type;

        $attributes = Attribute::where('importer_id', $user_id)->get();
        return view('backend.importer.attribute.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.importer.attribute.create');
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
            'name' => 'required|unique:attributes',
            'slug' => 'required|unique:attributes',
            'status' => 'required',
        ]);

        $user = Auth::user();
        $user_id = Auth::user()->id;
        $user_type = Auth::user()->type;

        $attribute = new Attribute();
        $attribute->admin_id = 1;
        $attribute->vendor_id = Null;
        $attribute->merchant_id = Null;
        $attribute->importer_id = $user_id;
        $attribute->name = $request->name;
        $attribute->slug = $request->slug;
        $attribute->discription = $request->discription;
        $attribute->status = $request->status;
        $attribute->save();

        $notification=array(
            'message' => 'Attribute Saved Successfully !!',
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
        $attribute = Attribute::findorfail($id);
        return view('backend.importer.attribute.edit', compact('attribute'));
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
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $user_type = Auth::user()->type;
        
        $attribute = Attribute::findorfail($id);
        $attribute->admin_id = 1;
        $attribute->vendor_id = Null;
        $attribute->merchant_id = Null;
        $attribute->importer_id = $user_id;
        $attribute->name = $request->name;
        $attribute->slug = $request->slug;
        $attribute->discription = $request->discription;
        $attribute->status = $request->status;
        $attribute->save();

        $notification=array(
            'message' => 'Attribute Updated Successfully !!',
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
        //
    }
}
