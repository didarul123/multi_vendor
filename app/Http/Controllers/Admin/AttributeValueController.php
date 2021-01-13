<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Attribute_value;

class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::get();
        $attribute_values = Attribute_value::get();
        return view('backend.admin.attribute_value.index', compact('attributes', 'attribute_values'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'attribute_id' => 'required',
            'value' => 'required',
            'slug' => 'required|unique:attribute_values',
            'status' => 'required',
        ]);

        $attribute = new Attribute_value();
        $attribute->attribute_id = $request->attribute_id;
        $attribute->value = $request->value;
        $attribute->slug = $request->slug;
        $attribute->description = $request->description;
        $attribute->status = $request->status;
        $attribute->save();

        $notification=array(
            'message' => 'Attribute Value Saved Successfully !!',
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
        $attribute_value = Attribute_value::findorfail($id);
        $attributes = Attribute::get();
        $attribute_values = Attribute_value::get();
        return view('backend.admin.attribute_value.edit', compact('attribute_value', 'attributes', 'attribute_values'));
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

        $attribute = Attribute_value::findorfail($id);
        $attribute->attribute_id = $request->attribute_id;
        $attribute->value = $request->value;
        $attribute->slug = $request->slug;
        $attribute->description = $request->description;
        $attribute->status = $request->status;
        $attribute->save();

        $notification=array(
            'message' => 'Attribute Value Updated Successfully !!',
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
        $attribute_value = Attribute_value::findorfail($id);
        $attribute_value->delete();
        $notification=array(
            'message' => 'Attribute value Deleted Successfully !!',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
}
