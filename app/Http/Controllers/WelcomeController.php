<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Post;

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
use App\Models\Page;
use App\Models\Subscription;
use Auth;
use Session;
use DB;
use Cart;
use Str;

class WelcomeController extends Controller
{
    public function welcome(){
    	$categories = Category::where('status', 1)->where('parent_id', 0)->get();
    	$newProducts = Product::where('status', 1)->orderBy('id', 'desc')->take('4')->get();
    	$oldProducts = Product::where('status', 1)->orderBy('id', 'asc')->take('4')->get();
    	$LatestShop = Shop::orderBy('id', 'desc')->take('1')->first();
    	$Shops = Shop::orderBy('id', 'asc')->take('6')->get();
    	$Products = Product::where('status', 1)->take(12)->get();
        $ReadyProducts = Product::where('status', 1)->take(3)->get();
    	$Posts = Post::where('status', 1)->get();

        $mostDiscountPro = Product::where('discount' , '!=', 0)->where('status', 1)->count();
        $mostDiscountPros = Product::orderBy('discount', 'desc')->where('status', 1)->take(2)->get();

    	return view('welcome', compact('categories', 'newProducts', 'oldProducts', 'LatestShop', 'Shops', 'Products', 'Posts', 'ReadyProducts', 'mostDiscountPros', 'mostDiscountPro'));
    }

    public function product_details($slug){

        $product = Product::where('slug', $slug)->first();
        
        $attributes = Attribute::where('status', 1)->get();
        $product_images = Product_image::where('product_id', $product->id)->get();
        $product_categories = Product_category::where('product_id', $product->id)->get();
        $product_attributes = Product_attribute::where('product_id', $product->id)->get();
        $product_variations = Product_variation::where('product_id', $product->id)->get();
        
        if ($product->vendor_id) {
            $vendor = Vendor::where('id', $product->vendor_id)->first();
            $shop = Shop::where('owner_id', $vendor->id)->where('owner_type', 'vendor')->first();
        }
        if($product->importer_id){
            $importer = Importer::where('id', $product->importer_id)->first();
            $shop = Shop::where('owner_id', $importer->id)->where('owner_type', 'importer')->first();
        }
        if($product->merchant_id){
            $merchant = Merchant::where('id', $product->merchant_id)->first();
            $shop = Shop::where('owner_id', $merchant->id)->where('owner_type', 'merchant')->first();
        }

        return view('product.product_details', compact('product', 'attributes', 'product_images', 'product_categories', 'product_attributes', 'product_variations', 'shop'));
    }  


    public function page_description($slug){
        $content = Page::where('slug',$slug)->first();
        return view('pages',compact('content'));
    }


  public function trp(){
      $trps = Product::orderBy('total_sell', 'desc')
                          ->where('status', 1)
                          ->get();
      return view('product.trp', compact('trps'));

  }


  public function discount_product(){
      $discount_products = Product::orderBy('discount', 'desc')
                            ->where('discount', '!=', 0)
                            ->where('status', 1)
                            ->get();
      return view('product.discount_products', compact('discount_products'));

  }

  public function subscription(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|unique:subscriptions',
        ]);

        $subscription = new Subscription();
        $subscription->email = $request->email;
        $subscription->save();
        $notification=array(
            'message' => 'Subscription Successfully Done!!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
      

  }


}
