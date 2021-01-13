<?php

namespace App\Http\Controllers\Importer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Product_category;
use App\Models\Product_attribute;
use App\Models\Product_variation;
use App\Models\Vendor;
use App\Models\Shop;
use App\Models\Attribute;
use App\Models\PaymentMethod;
use App\Models\Admin;
use App\Models\Importer;
use App\Models\Order;
use App\Models\OrderDetails;
use Auth;
use Session;
use DB;
use Cart;
use Str;

class ShopController extends Controller
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
        

        $products = Product::where('vendor_id', "!=", '')->simplepaginate(20);

        return view('backend.importer.shop.vendor_products', compact('products'));
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
        $product_id = $request->product_id;
        $attribute_value = $request->attribute_value;
        $quantity = $request->quantity;

        $product_details = Product::where('products.id', $product_id)->first();

        $data = array();
        $data['id']=$product_details->id;
        $data['name']=$product_details->name;
        $data['price']=$product_details->sell_price;
        $data['qty']= $quantity;
        $data['weight']=$product_details->id;
        $data['options']['image']=$product_details->image;
        $data['options']['attribute_value']=$attribute_value;

        $cart = Cart::add($data);


        // echo "<pre>";
        // print_r($cart);
        // echo "</pre>";
         return view('backend.importer.shop.cart'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $attributes = Attribute::where('status', 1)->get();
        $product_images = Product_image::where('product_id', $id)->get();
        $product_categories = Product_category::where('product_id', $id)->get();
        $product_attributes = Product_attribute::where('product_id', $id)->get();
        $product_variations = Product_variation::where('product_id', $id)->get();
        $vendor = Vendor::where('id', $product->vendor_id)->first();
        $shop = Shop::where('owner_id', $vendor->id)->where('owner_type', 'vendor')->first();

        // $top_sell = Product::where('vendor_id', $product->vendor_id)->where('qty', 'asc')->first();
        // dd($top_sell);

        return view('backend.importer.shop.product_details', compact('product', 'product_images', 'product_categories', 'product_attributes', 'vendor', 'shop', 'attributes', 'product_variations', 'top_sell'));
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


    public function remove_from_cart($rowId){
        Cart::remove($rowId);
        return view('backend.importer.shop.cart'); 
    }

    public function add_to_cart(Request $request){
        $product_id = $request->product_id;
        $attribute_value = $request->attribute_value;
        $quantity = $request->quantity;

        $product_details = Product::where('products.id', $product_id)->first();

        $data = array();
        $data['id']=$product_details->id;
        $data['name']=$product_details->name;
        $data['price']=$product_details->sell_price;
        $data['qty']= $quantity;
        $data['weight']=$product_details->id;
        $data['options']['image']=$product_details->image;
        $data['options']['attribute_value']=$attribute_value;

        $cart = Cart::add($data);


        // echo "<pre>";
        // print_r($cart);
        // echo "</pre>";
        return redirect()->back();
    }
    
    public function show_cart(){
        return view('backend.importer.shop.cart'); 
    }

    public function update_cart(Request $request){
        $rowid = $request->rowid;
        $quantity = $request->quantity;
        if (!empty($rowid)) {
            foreach ($quantity as $key => $value) {
                $cart = Cart::get($rowid[$key]);

                Cart::update($rowid[$key], $value);
            }

        }
        return view('backend.importer.shop.cart'); 
    } 

    public function checkout(){
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $user_type = Auth::user()->type;
        $shop = Shop::where('owner_id', $user_id)->where('owner_type', $user_type)->first();
        $shop_owner = Importer::where('id', $shop->owner_id)->first();
        return view('backend.importer.shop.checkout', compact('shop', 'shop_owner'));
    }

    public function total_amount(Request $request){
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $user_type = Auth::user()->type;

        $f_name = $request->f_name;
        $l_name = $request->l_name;
        $number = $request->number;
        $shipping_address = $request->shipping_address;
        $city = $request->city;
        $postcode = $request->postcode;
        $country = $request->country;

        $paymentMethods = PaymentMethod::where('status', 1)->get();
        $admin = Admin::first();
        $shop = Shop::where('owner_id', $user_id)->where('owner_type', $user_type)->first();
        $shop_owner = Importer::where('id', $shop->owner_id)->first();

        return view('backend.importer.shop.total_amount', compact('paymentMethods', 'admin', 'f_name', 'l_name', 'number', 'shipping_address', 'city', 'postcode', 'country', 'shop', 'shop_owner'));
    }

    public function submit_order(Request $request)
    {


        $user = Auth::user();
        $user_id = Auth::user()->id;
        $user_type = Auth::user()->type;

        $f_name = $request->f_name;
        $l_name = $request->l_name;
        $number = $request->number;
        $shipping_address = $request->shipping_address;
        $city = $request->city;
        $postcode = $request->postcode;
        $country = $request->country;

        $paymentMethods = PaymentMethod::where('status', 1)->get();
        $admin = Admin::first();
        $shop = Shop::where('owner_id', $user_id)->where('owner_type', $user_type)->first();
        $shop_owner = Importer::where('id', $shop->owner_id)->first();

        $shop_id = $request->shop_id;
        $payment_method = $request->payment_method;
        $transaction_id = $request->transaction_id;
        $invoice_id =  rand(10000,100000);

        $total_qty = Cart::count();
        $total_cost = Cart::total();

        if ($total_cost == 0) {
            session()->flash('empty_notif', "Your Cart Is Empty !!");
            return view('backend.importer.shop.total_amount', compact('paymentMethods', 'admin', 'f_name', 'l_name', 'number', 'shipping_address', 'city', 'postcode', 'country', 'shop', 'shop_owner'));

        }else{

            $order = new Order();
            $order->shop_id = $shop_id;
            $order->invoice_id = $invoice_id;
            $order->total_qty = $total_qty;
            $order->total_cost = $total_cost;
            $order->payment_method = $payment_method;
            $order->transaction_id = $transaction_id;
            $order->shipping_address = $shipping_address;
            $order->city = $city;
            $order->postcode = $postcode;
            $order->country = $country;
            $order->status = 0;
            $order->save();

            $order_id = $order->id;

            $contents = Cart::content();
            foreach ($contents as $content) {
                $orderDetails = new OrderDetails();
                $orderDetails->order_id = $order_id;
                $orderDetails->product_id = $content->id;

                $product_owner = Product::where('id', $content->id)->first();

                $orderDetails->product_owner_id = $product_owner->vendor_id;
                $orderDetails->product_owner_type = 'vendor';
                $orderDetails->product_price = $content->price;
                $orderDetails->qty_total_amount = $content->price * $content->qty;
                $orderDetails->attribute_value = $content->options->attribute_value;
                $orderDetails->qty = $content->qty;
                $orderDetails->save();  
            }

            Cart::destroy();

            session()->flash('notif', "Your order submit successfully !!");

            return view('backend.importer.shop.total_amount', compact('paymentMethods', 'admin', 'f_name', 'l_name', 'number', 'shipping_address', 'city', 'postcode', 'country', 'shop', 'shop_owner'));

        }

    }

    public function order_history()
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $user_type = Auth::user()->type;

        $shop = Shop::where('owner_id', $user_id)->where('owner_type', $user_type)->first();
        $shop_owner = Importer::where('id', $shop->owner_id)->first();

        $orders = Order::where('shop_id', $shop->id)->get();
        
        return view('backend.importer.order.order_history', compact('orders'));
    }

}
