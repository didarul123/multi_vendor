<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Importer;
use App\Models\Vendor;
use App\Models\Product;
use Auth;
use Session;

class ImporterController extends Controller
{
    public function loginForm(){
    	return view('importer.login');
    }    

    public function login(Request $request){
    	$credentials = $request->only('email', 'password');

    	if (Auth::guard('importer')->attempt($credentials, $request->remember)) {
    		$user = Importer::where('email', $request->email)->first();
    		Auth::guard('importer')->login($user);
    		return redirect()->route('importer.home');
    	}
    	
    	return redirect()->route('importer.login')->with('status', 'Failed To Process Login');

    }

    public function dashboard(){
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $user_type = Auth::user()->type;

        $products = Product::where('importer_id', $user_id)->count();

        $vendors = Vendor::get();
    	return view('importer.home', compact('vendors', 'products'));
    }

    public function logout(){
        if (Auth::guard('importer')) {
            session::flush();
            return redirect()->route('importer.login')->with('status', 'Logout Successully!');
        }
    }
}
