<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Withdraw;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $withdraws = Withdraw::get();
        return view('backend.admin.withdraw.index', compact('withdraws'));
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
        $withdraw = Withdraw::findorfail($id);
        return view('backend.admin.withdraw.details', compact('withdraw'));
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
        //
    }

    public function inactive_withdraw($id){
        $withdraw = Withdraw::find($id);
        $withdraw->status = 0;
        $withdraw->save();
        $notification=array(
            'message' => 'Withdraw Inactived Successfully !!',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function active_withdraw($id){
        $withdraw = Withdraw::find($id);
        $withdraw->status = 1;
        $withdraw->save();
        $notification=array(
            'message' => 'Withdraw Actived Successfully !!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function bulk_approve(Request $request){

        $datas = $request->id;
        if($datas){
            foreach ($datas as $value){
                $data = Withdraw::find($value);
                $data->status = 1;
                $data->save();

            }
            $notification=array(
                'message' => 'All Withdraw Successfully Approved !!! ',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }

    }

}
