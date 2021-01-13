<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use App\Models\Vendor;
use App\Models\Importer;
use App\Models\Merchant;
use Auth;
use Session;

class RegistrationController extends Controller
{
    public function registration()
    {
    	return view('register.registration');
    }  
    public function vendor_registration()
    {
    	return view('register.vendor_registration');
    }  
    public function importer_registration()
    {
    	return view('register.importer_registration');
    }   
    public function merchant_registration()
    {
    	return view('register.merchant_registration');
    }      
    public function customerForm(Request $request)
    {
        $this->validate($request, [
        'first_name' => 'required',
        'last_name' => 'required',
        'phone' => 'required| unique:customers',
        'email' => 'required | unique:customers',
        'address' => 'required',
        'city' => 'required',
        'post_code' => 'required',
        'country' => 'required',
        'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        ]);

    	$first_name = $request->first_name;
    	$last_name = $request->last_name;
    	$gender = $request->gender;
    	$phone = $request->phone;
    	$email = $request->email;
    	$address = $request->address;
    	$city = $request->city;
    	$post_code = $request->post_code;
    	$country = $request->country;
    	$password = $request->password;

        $customer = new Customer();
        $customer->first_name = $first_name;
        $customer->last_name = $last_name;
        $customer->phone = $phone;
        $customer->gender = $gender;
        $customer->email = $email;
        $customer->address = $address;
        $customer->city = $city;
        $customer->post_code = $post_code;
        $customer->country = $country;
        $customer->password = md5($password);
        $customer->status = 0;
        $customer->save();

        Session::put('user_id', $customer->id);
        Session::put('first_name', $customer->first_name);
          
        session()->flash('notif', "Your Registration Successful !! ");

        return view('register.registration');

    }   

    public function vendorForm(Request $request)
    {
        $this->validate($request, [
        'first_name' => 'required',
        'last_name' => 'required',
        'phone' => 'required| unique:vendors',
        'email' => 'required | unique:vendors',
        'company' => 'required',
        'address' => 'required',
        'city' => 'required',
        'post_code' => 'required',
        'country' => 'required',
        'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        ]);

    	$first_name = $request->first_name;
    	$last_name = $request->last_name;
    	$gender = $request->gender;
    	$company = $request->company;
    	$phone = $request->phone;
    	$email = $request->email;
    	$address = $request->address;
    	$city = $request->city;
    	$post_code = $request->post_code;
    	$country = $request->country;
    	$password = $request->password;

        $vendor = new Vendor();
        $vendor->type = 'vendor';
        $vendor->name = $first_name.' '.$last_name;
        $vendor->phone = $phone;
        $vendor->company = $company;
        $vendor->gender = $gender;
        $vendor->email = $email;
        $vendor->address = $address;
        $vendor->city = $city;
        $vendor->post_code = $post_code;
        $vendor->country = $country;
        $vendor->password = md5($password);
        $vendor->status = 0;
        $vendor->save();

        Session::put('user_id', $vendor->id);
        Session::put('name', $vendor->name);
        Session::put('user_type', 'vendor');
          
        session()->flash('notif', "Your Registration Successful !! ");

        return view('register.vendor_registration');

    }   

    public function importerForm(Request $request)
    {
        $this->validate($request, [
        'first_name' => 'required',
        'last_name' => 'required',
        'phone' => 'required| unique:importers',
        'email' => 'required | unique:importers',
        'company' => 'required',
        'address' => 'required',
        'city' => 'required',
        'post_code' => 'required',
        'country' => 'required',
        'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        ]);

    	$first_name = $request->first_name;
    	$last_name = $request->last_name;
    	$gender = $request->gender;
    	$company = $request->company;
    	$phone = $request->phone;
    	$email = $request->email;
    	$address = $request->address;
    	$city = $request->city;
    	$post_code = $request->post_code;
    	$country = $request->country;
    	$password = $request->password;

        $importer = new Importer();
        $importer->type = 'importer';
        $importer->name = $first_name.' '.$last_name;
        $importer->phone = $phone;
        $importer->company = $company;
        $importer->gender = $gender;
        $importer->email = $email;
        $importer->address = $address;
        $importer->city = $city;
        $importer->post_code = $post_code;
        $importer->country = $country;
        $importer->password = md5($password);
        $importer->status = 0;
        $importer->save();

        Session::put('user_id', $importer->id);
        Session::put('name', $importer->name);
        Session::put('user_type', 'importer');  
        session()->flash('notif', "Your Registration Successful !! ");

        return view('register.importer_registration');

    }    

    public function merchantForm(Request $request)
    {
        $this->validate($request, [
        'first_name' => 'required',
        'last_name' => 'required',
        'phone' => 'required| unique:merchants',
        'email' => 'required | unique:merchants',
        'company' => 'required',
        'address' => 'required',
        'city' => 'required',
        'post_code' => 'required',
        'country' => 'required',
        'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        ]);

    	$first_name = $request->first_name;
    	$last_name = $request->last_name;
    	$gender = $request->gender;
    	$company = $request->company;
    	$phone = $request->phone;
    	$email = $request->email;
    	$address = $request->address;
    	$city = $request->city;
    	$post_code = $request->post_code;
    	$country = $request->country;
    	$password = $request->password;

        $merchant = new Merchant();
        $merchant->type = 'merchant';
        $merchant->name = $first_name.' '.$last_name;
        $merchant->phone = $phone;
        $merchant->company = $company;
        $merchant->gender = $gender;
        $merchant->email = $email;
        $merchant->address = $address;
        $merchant->city = $city;
        $merchant->post_code = $post_code;
        $merchant->country = $country;
        $merchant->password = md5($password);
        $merchant->status = 0;
        $merchant->save();

        Session::put('user_id', $merchant->id);
        Session::put('name', $merchant->name);
        Session::put('user_type', 'merchant');  
        
        session()->flash('notif', "Your Registration Successful !! ");

        return view('register.merchant_registration');

    }   



    public function logout(){
        Session::flush();
        return Redirect('/');
    }





}
