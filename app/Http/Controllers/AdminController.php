<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Vendor;
use App\Models\Importer;
use App\Models\Merchant;
use App\Models\Customer;
use Auth;
use Session;

class AdminController extends Controller
{
    public function loginForm(){
    	return view('admin.login');
    }    

    public function login(Request $request){
    	$credentials = $request->only('email', 'password');
    	if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
    		$user = Admin::where('email', $request->email)->first();
    		Auth::guard('admin')->login($user);
    		return redirect()->route('admin.home');
    	}
    	return redirect()->route('admin.login')->with('status', 'Failed To Process Login');
    }

    public function dashboard(){
        $vendors = Vendor::get();
        $importers = Importer::get();
        $merchants = Merchant::get();
        $customers = Customer::get();
    	return view('admin.home', compact('vendors', 'importers', 'merchants', 'customers'));
    }

    public function logout(){
        if (Auth::guard('admin')) {
            session::flush();
            return redirect()->route('admin.login')->with('status', 'Logout Successully!');
        }
        
    }
}
