<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Vendor;
use App\Models\Importer;
use App\Models\Merchant;
use Auth;
use Session;

class LoginController extends Controller
{
    public function loginForm(){
		return view('loginfrom.loginForm');
    }
    public function VendorLoginForm(){
		return view('loginfrom.VendorLoginForm');
    }
    public function ImporterLoginForm(){
		return view('loginfrom.ImporterLoginForm');
    }
    public function MerchantLoginForm(){
		return view('loginfrom.MerchantLoginForm');
    }

    public function customer_login(Request $request){
        $email = $request->email;
        $password = md5($request->password);
        $result = Customer::where('email', $email)->where('password', $password)->first();
        if ($result) {
            Session::put('user_id', $result->id);
            Session::put('first_name', $result->first_name);
           	return redirect('/');
        }else{
            session()->flash('login_failed', "Information doesn't match !! ");
            return redirect()->back();
        } 
    }

    public function vendor_login(Request $request){
        $email = $request->email;
        $password = md5($request->password);
        $result = Vendor::where('email', $email)->where('password', $password)->first();
        if ($result) {
            Session::put('user_id', $result->id);
            Session::put('name', $result->name);
            Session::put('user_type', 'vendor');
           	return redirect('/');
        }else{
            session()->flash('login_failed', "Information doesn't match !! ");
            return redirect()->back();
        } 
    }

    public function importer_login(Request $request){
        $email = $request->email;
        $password = md5($request->password);
        $result = Importer::where('email', $email)->where('password', $password)->first();
        if ($result) {
            Session::put('user_id', $result->id);
            Session::put('name', $result->name);
            Session::put('user_type', 'importer');
           	return redirect('/');
        }else{
            session()->flash('login_failed', "Information doesn't match !! ");
            return redirect()->back();
        } 
    }

    public function merchant_login(Request $request){
        $email = $request->email;
        $password = md5($request->password);
        $result = Merchant::where('email', $email)->where('password', $password)->first();
        if ($result) {
            Session::put('user_id', $result->id);
            Session::put('name', $result->name);
            Session::put('user_type', 'merchant');
           	return redirect('/');
        }else{
            session()->flash('login_failed', "Information doesn't match !! ");
            return redirect()->back();
        } 
    }
}
