<?php

namespace App\Http\Controllers;

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
use App\Models\Merchant;
use Auth;
use Session;
use DB;
use Cart;
use Str;

class ShopController extends Controller
{
    public function show_cart(Request $request){
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

      	$contents = Cart::content();
      	$sub_total = Cart::subtotal();
      	$shipping = 10;
		$sub_total_num = (float) str_replace(',', '', $sub_total);
       	$total = $sub_total_num+$shipping;

        return view('shop.cart', compact('cart', 'contents', 'sub_total', 'shipping', 'total'));
    }
    public function cart(){
      	$contents = Cart::content();
      	$sub_total = Cart::subtotal();
      	$shipping = 10;
		$sub_total_num = (float) str_replace(',', '', $sub_total);
       	$total = $sub_total_num+$shipping;
        return view('shop.cart', compact('contents', 'sub_total', 'shipping', 'total'));
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

    public function update_cart(Request $request){
        $rowid = $request->rowid;
        $quantity = $request->quantity;
        if (!empty($rowid)) {
            foreach ($quantity as $key => $value) {
                $cart = Cart::get($rowid[$key]);

                Cart::update($rowid[$key], $value);
            }

        }

      	$contents = Cart::content();
      	$sub_total = Cart::subtotal();
        $shipping = 10.00;

		$sub_total_num = (float) str_replace(',', '', $sub_total);
       	$total = $sub_total_num+$shipping;


        return view('shop.cart', compact('contents', 'sub_total', 'shipping', 'total'));
    } 

    public function remove_from_cart($rowId){
        Cart::remove($rowId);

      	$contents = Cart::content();
      	$sub_total = Cart::subtotal();
        $shipping = 10;

		$sub_total_num = (float) str_replace(',', '', $sub_total);
       	$total = $sub_total_num+$shipping;

        return view('shop.cart', compact('contents', 'sub_total', 'shipping', 'total'));
    }

    public function checkout(){
        $user_id = Session::get('user_id');

      	$contents = Cart::content();
      	$sub_total = Cart::subtotal();
        $shipping = 10;

		$sub_total_num = (float) str_replace(',', '', $sub_total);
       	$total = $sub_total_num+$shipping;

        if ($user_id) {
        	if ($sub_total == 0) {
        		 session()->flash('empty_notif', "Your cart is empty !!");
        		return view('shop.cart', compact('contents', 'sub_total', 'shipping', 'total'));
        	}else{
        		return view('shop.checkout');
        	}
        }else{
        	return view('shop.checkoutRegistration');
        }
        
    }

    public function total_amount(Request $request){
        $user_id = Session::get('user_id');
        $user_type = Session::get('user_type');

        if ($user_id && $user_type) {
        	session()->flash('shop_notif', "If You are not a customer, Please create a shop, then order !!");
        	return view('shop.checkout');
        }else{

        $f_name = $request->f_name;
        $l_name = $request->l_name;
        $number = $request->number;
        $shipping_address = $request->shipping_address;
        $city = $request->city;
        $postcode = $request->postcode;
        $country = $request->country;

        $paymentMethods = PaymentMethod::where('status', 1)->get();
        $admin = Admin::first();
        
      	$sub_total = Cart::subtotal();
        $shipping = 10.00;

		    $sub_total_num = (float) str_replace(',', '', $sub_total);
       	$total = $sub_total_num+$shipping;

       	if ($user_id && $user_type == 'vendor') {
       		$shop = Shop::where('owner_id', $user_id)->where('owner_type', 'vendor')->first();
       		if ($shop) {
       			$shop_owner = Vendor::where('id', $shop->owner_id)->first();
       		}
       	}
       	if ($user_id && $user_type == 'merchant') {
       		$shop = Shop::where('owner_id', $user_id)->where('owner_type', 'merchant')->first();
       		if ($shop) {
       			$shop_owner = Merchant::where('id', $shop->owner_id)->first();
       		}
       	}
       	if ($user_id && $user_type == 'importer') {
       		$shop = Shop::where('owner_id', $user_id)->where('owner_type', 'importer')->first();
       		if ($shop) {
       			$shop_owner = Importer::where('id', $shop->owner_id)->first();
       		}
       	}
       	

        	return view('shop.total_amount', compact('user_id', 'paymentMethods', 'admin', 'f_name', 'l_name', 'number', 'shipping_address', 'city', 'postcode', 'country', 'admin', 'total', 'shop'));
        }
    }


    public function submit_order(Request $request)
    {
        $user_id = Session::get('user_id');
        $user_type = Session::get('user_type');

        $f_name = $request->f_name;
        $l_name = $request->l_name;
        $number = $request->number;
        $shipping_address = $request->shipping_address;
        $city = $request->city;
        $postcode = $request->postcode;
        $country = $request->country;

        $paymentMethods = PaymentMethod::where('status', 1)->get();
        $admin = Admin::first();
       	if ($user_id && $user_type == 'vendor') {
       		$shop = Shop::where('owner_id', $user_id)->where('owner_type', 'vendor')->first();
       		if ($shop) {
       			$shop_owner = Vendor::where('id', $shop->owner_id)->first();
       		}
       	}
       	if ($user_id && $user_type == 'merchant') {
       		$shop = Shop::where('owner_id', $user_id)->where('owner_type', 'merchant')->first();
       		if ($shop) {
       			$shop_owner = Merchant::where('id', $shop->owner_id)->first();
       		}
       	}
       	if ($user_id && $user_type == 'importer') {
       		$shop = Shop::where('owner_id', $user_id)->where('owner_type', 'importer')->first();
       		if ($shop) {
       			$shop_owner = Importer::where('id', $shop->owner_id)->first();
       		}
       	}

        $shop_id = $request->shop_id;
        $payment_method = $request->payment_method;
        $transaction_id = $request->transaction_id;
        $invoice_id =  rand(10000,100000);

        $total_qty = Cart::count();
      	$sub_total = Cart::subtotal();
        $shipping = 10.00;

		$sub_total_num = (float) str_replace(',', '', $sub_total);
       	$total = $sub_total_num+$shipping;


        if ($total == 0) {
            session()->flash('empty_notif', "Your Cart Is Empty !!");
            return view('shop.total_amount', compact('paymentMethods', 'admin', 'f_name', 'l_name', 'number', 'shipping_address', 'city', 'postcode', 'country', 'shop', 'shop_owner' ,'total'));

        }else{

            $order = new Order();
            $order->shop_id = $shop_id;
            $order->invoice_id = $invoice_id;
            if ($shop_id) {
              $order->customer_id = Null;
            }else{
              $order->customer_id = $user_id;
            }
            $order->total_qty = $total_qty;
            $order->total_cost = $total;
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
                if ($product_owner->importer_id) {
                    $orderDetails->product_owner_id = $product_owner->importer_id;
                    $orderDetails->product_owner_type = 'importer';
                }
                if($product_owner->merchant_id){
                    $orderDetails->product_owner_id = $product_owner->merchant_id;
                    $orderDetails->product_owner_type = 'merchant';
                }
                if($product_owner->vendor_id){
                    $orderDetails->product_owner_id = $product_owner->vendor_id;
                    $orderDetails->product_owner_type = 'vendor';
                }

                $orderDetails->product_price = $content->price;
                $orderDetails->qty_total_amount = $content->price * $content->qty;
                $orderDetails->attribute_value = $content->options->attribute_value;
                $orderDetails->qty = $content->qty;
                $orderDetails->save();  
            }

            Cart::destroy();
            $total = 0;

            session()->flash('notif', "Your order submit successfully !!");

            return view('shop.total_amount', compact('paymentMethods', 'admin', 'f_name', 'l_name', 'number', 'shipping_address', 'city', 'postcode', 'country', 'shop', 'shop_owner', 'total'));

        }

    }



  public function product_search(Request $request){
      $search_products = Product::where('name', 'LIKE', '%'.$request->product_name.'%')
                          ->where('status', 1)
                          ->take(20)
                          ->get();
      return view('product.search_product', compact('search_products'));

  }

  public function search_product(Request $request){
      $search_products = Product::join('product_categories', 'products.id', '=', 'product_categories.product_id')
                          ->select('products.*', 'product_categories.category_id')
                          ->where('product_categories.category_id', 'LIKE', '%'.$request->category_id.'%')
                          ->where('name', 'LIKE', '%'.$request->product_name.'%')
                          ->where('status', 1)
                          ->get();
      return view('product.searchProduct', compact('search_products'));

  }

  public function ready_to_ship(){
      $ready_products = Product::where('status', 1)->get();
      return view('product.ready_products', compact('ready_products'));

  }

    public function category_wise_product($id){
      $category_wise_products = Product::join('product_categories', 'products.id', '=', 'product_categories.product_id')
                              ->select('products.*', 'product_categories.category_id')
                              ->where('products.id', $id)
                              ->get();

        return view('product.category_wise_product', compact('category_wise_products', 'slug'));
    }  

    public function sub_category_wise_product($id){
        $sub_cat_products = Product::join('product_categories', 'products.id', '=', 'product_categories.product_id')
                            ->select('products.*', 'product_categories.product_id')
                            ->where('product_categories.category_id', $id)
                            ->get();

        return view('product.sub_category_wise_product', compact('sub_cat_products', 'slug'));
    }  


    public function prosubcategory_wise_product($id){
        $prosub_cat_products = Product::join('product_categories', 'products.id', '=', 'product_categories.product_id')
                              ->select('products.*', 'product_categories.category_id')
                              ->where('products.id', $id)
                              ->get();

        return view('product.prosub_cat_products', compact('prosub_cat_products', 'id'));
    }  


}
