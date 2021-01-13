<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Message;
use App\Models\Message_replay;
use App\Models\Shop;
use Auth;
use Session;

class MerchantController extends Controller
{
    public function loginForm(){
        return view('merchant.login');
    }    

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::guard('merchant')->attempt($credentials, $request->remember)) {
            $user = Merchant::where('email', $request->email)->first();
            Auth::guard('merchant')->login($user);
            return redirect()->route('merchant.home');
        }
        
        return redirect()->route('merchant.login')->with('status', 'Failed To Process Login');

    }

    public function dashboard(){
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $user_type = Auth::user()->type;

        $shop = Shop::where('owner_id', $user_id)->where('owner_type', $user_type)->first();
        $products = Product::where('merchant_id', $user_id)->count();

        return view('merchant.home', compact('shop', 'products'));
    }

    public function logout(){
        if (Auth::guard('merchant')) {
            session::flush();
            return redirect()->route('merchant.login')->with('status', 'Logout Successully!');
        }
    }

    public function vendors(){
        $vendors = Vendor::where('status', 1)->get();
        return view('backend.merchant.vendors.index', compact('vendors'));
    }

    public function vendor_profile($id){
        $vendor = Vendor::where('id', $id)->first();
        $total_product = Product::where('vendor_id', $id)->count();
        return view('backend.merchant.vendors.vendor_profile', compact('vendor', 'total_product'));
    }

    public function send_message($id){
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $user_type = Auth::user()->type;

        $vendor = Vendor::where('id', $id)->first();

        $messages = Message::where('sender_id', $user_id)->where('recever_id', $id)->get();

        return view('backend.merchant.vendors.send_message', compact('vendor', 'user_id', 'user_type', 'messages', 'user'));
    }


    public function message(Request $request){

        $sender_id = $request->sender_id;
        $sender_type = $request->sender_type;
        $recever_id = $request->recever_id;
        $recever_type = $request->recever_type;
        $text = $request->message;
        $subject = $request->subject;
        

        $message = new Message();
        $message->sender_id = $sender_id;
        $message->sender_type = $sender_type;
        $message->recever_id = $recever_id;
        $message->recever_type = $recever_type;
        $message->subject = $subject;
        $message->message = $text;
        $message->is_read = 0;
        $message->save();

        session()->flash('notif', "Sent Successully Done !! ");
        return redirect()->back();

    }

    public function show_message($id){
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $user_type = Auth::user()->type;

        $messages = Message::where('sender_id', $user_id)->where('recever_id', $id)->get();
        $vendor = Vendor::where('id', $id)->where('type', 'vendor')->first();

        return view('backend.merchant.vendors.show_message', compact('user_id', 'user_type', 'messages', 'user', 'vendor'));
    }

    public function vendor_replay($id){
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $user_type = Auth::user()->type;
        $message = Message::where('id', $id)->first();

        $replay_message = Message_replay::where('message_id', $id)->first();

        return view('backend.merchant.vendors.vendor_replay', compact('user_id', 'user_type', 'message', 'user', 'replay_message'));
    }


}
