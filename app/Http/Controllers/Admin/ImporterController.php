<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Importer;
use App\Models\Product;

class ImporterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $importers = Importer::get();
        return view('backend.admin.importer.index', compact('importers'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $importer = Importer::findorfail($id);
        $importer_details = Importer::where('id', $id)->first();
        $total_products = Product::where('user_id', $id)->where('user_type', $importer_details->type)->count();
        return view('backend.admin.importer.details', compact('importer', 'total_products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $importer = Importer::findorfail($id);
        $importer->delete();
        $notification=array(
            'message' => 'Importer Deleted Successfully !!',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function inactive_importer($id){
        $importer = Importer::find($id);
        $importer->status = 0;
        $importer->save();
        $notification=array(
            'message' => 'Importer Inactived Successfully !!',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function active_importer($id){
        $importer = Importer::find($id);
        $importer->status = 1;
        $importer->save();
        $notification=array(
            'message' => 'Importer Actived Successfully !!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
