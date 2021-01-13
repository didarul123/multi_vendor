<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ImporterController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WelcomeController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\ProsubcategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\DeliveryMethodController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\WithdrawController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AttributeValueController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\MailController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');
Route::get('product-details/{slug}', [WelcomeController::class, 'product_details'])->name('product-details');
Route::get('page-description/{slug}', [WelcomeController::class, 'page_description'])->name('page-description');


Route::get('config_cache', function(){
    Artisan::call('config:cache');
    return "Config-Cache is cleared";
});


Route::get('registration', [RegistrationController::class, 'registration'])->name('registration');
Route::get('vendor-registration', [RegistrationController::class, 'vendor_registration'])->name('vendor-registration');
Route::get('importer-registration', [RegistrationController::class, 'importer_registration'])->name('importer-registration');
Route::get('merchant-registration', [RegistrationController::class, 'merchant_registration'])->name('merchant-registration');

Route::post('customer-registration', [RegistrationController::class, 'customerForm'])->name('customer-registration');
Route::post('vendor-registration', [RegistrationController::class, 'vendorForm'])->name('vendor-registration');
Route::post('importer-registration', [RegistrationController::class, 'importerForm'])->name('importer-registration');
Route::post('merchant-registration', [RegistrationController::class, 'merchantForm'])->name('merchant-registration');

Route::get('loginForm', [LoginController::class, 'loginForm'])->name('loginForm');
Route::post('customer-login', [LoginController::class, 'customer_login'])->name('customer-login');
Route::get('VendorLoginForm', [LoginController::class, 'VendorLoginForm'])->name('VendorLoginForm');
Route::post('vendor-login', [LoginController::class, 'vendor_login'])->name('vendor-login');
Route::get('ImporterLoginForm', [LoginController::class, 'ImporterLoginForm'])->name('ImporterLoginForm');
Route::post('importer-login', [LoginController::class, 'importer_login'])->name('importer-login');
Route::get('MerchantLoginForm', [LoginController::class, 'MerchantLoginForm'])->name('MerchantLoginForm');
Route::post('merchant-login', [LoginController::class, 'merchant_login'])->name('merchant-login');
Route::get('logout', [RegistrationController::class, 'logout'])->name('logout');


Route::post('cart-page', [App\Http\Controllers\ShopController::class, 'show_cart'])->name('cart-page');
Route::get('cart', [App\Http\Controllers\ShopController::class, 'cart'])->name('cart');
Route::post('add-to-cart',  [App\Http\Controllers\ShopController::class, 'add_to_cart'])->name('add-to-cart');
Route::get('update-cart', [App\Http\Controllers\ShopController::class, 'update_cart'])->name('update-cart');
Route::get('remove-from-cart/{rowId}', [App\Http\Controllers\ShopController::class, 'remove_from_cart'])->name('remove-from-cart');
Route::get('checkout', [App\Http\Controllers\ShopController::class, 'checkout'])->name('checkout');
Route::post('total-amount', [App\Http\Controllers\ShopController::class, 'total_amount'])->name('total-amount');
Route::post('submit-order', [App\Http\Controllers\ShopController::class, 'submit_order'])->name('submit-order');


Route::get('category-wise-product/{id}', [App\Http\Controllers\ShopController::class, 'category_wise_product'])->name('category-wise-product');
Route::get('subcategory-wise-product/{id}', [App\Http\Controllers\ShopController::class, 'sub_category_wise_product'])->name('subcategory-wise-product');
Route::get('prosubcategory-wise-product/{id}', [App\Http\Controllers\ShopController::class, 'prosubcategory_wise_product'])->name('prosubcategory-wise-product');




Route::post('product-search', [App\Http\Controllers\ShopController::class, 'product_search'])->name('product-search');
Route::post('search-product', [App\Http\Controllers\ShopController::class, 'search_product'])->name('search-product');
Route::get('ready-to-ship', [App\Http\Controllers\ShopController::class, 'ready_to_ship'])->name('ready-to-ship');
Route::get('trp', [App\Http\Controllers\WelcomeController::class, 'trp'])->name('trp');
Route::post('subscription', [App\Http\Controllers\WelcomeController::class, 'subscription'])->name('subscription');
Route::get('discount_product', [App\Http\Controllers\WelcomeController::class, 'discount_product'])->name('discount_product');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

//Admin Route
Route::group(['prefix' => 'admin'], function(){
	Route::group(['middleware'=>'admin.guest'], function(){
		Route::get('login', [AdminController::class, 'loginForm'])->name('admin.login');
		Route::post('login', [AdminController::class, 'login'])->name('admin.auth');
	});

	Route::group(['middleware'=>'admin.auth'], function(){
		Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.home');		
		Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');

		//Category Controller
		Route::resource('category', CategoryController::class);
		Route::resource('subcategory', SubcategoryController::class);
		Route::resource('prosubcategory', ProsubcategoryController::class);

		//Brand Controller
		Route::resource('brand', BrandController::class);

		//Attribute Controller
		Route::resource('attribute', AttributeController::class);

		//Attribute Controller
		Route::resource('attribute_value', AttributeValueController::class);

		//Color Controller
		Route::resource('color', ColorController::class);

		//Size Controller
		Route::resource('size', SizeController::class);

		//Product Controller
		Route::resource('product', ProductController::class);
		Route::get('product-variation/{id}', [ProductController::class, 'product_variation'])->name('admin/product-variation');

		//Page Controller
		Route::resource('page', PageController::class);

		//Delivery Method Controller
		Route::resource('deliverymethod', DeliveryMethodController::class);	

		//Payment Method Controller
		Route::resource('paymentmethod', PaymentMethodController::class);	

		//Social Link Controller
		Route::resource('social', SocialLinkController::class);	

		//Subscription Controller
		Route::resource('subscription', SubscriptionController::class);
		Route::post('send-email', [MailController::class, 'send_email'])->name('admin/send-email');


		//Order Controller
		Route::resource('order', OrderController::class);	
		Route::get('admin/invoice-print/{id}', [OrderController::class, 'invoice_print'])->name('admin/invoice-print');		
		Route::post('admin/update-shipping-address/{id}', [OrderController::class, 'update_shipping_address'])->name('admin/update-shipping-address');
		Route::post('admin/update-order-summery/{id}', [OrderController::class, 'update_order_summery'])->name('admin/update-order-summery');

		Route::get('admin/filter-order', [OrderController::class, 'filter_order'])->name('admin/filter-order');


		//Vendor Controller
		Route::resource('vendor', App\Http\Controllers\Admin\VendorController::class);	
		Route::get('admin/inactive-vendor/{id}', [App\Http\Controllers\Admin\VendorController::class, 'inactive_vendor'])->name('admin/inactive-vendor');
		Route::get('admin/active-vendor/{id}', [App\Http\Controllers\Admin\VendorController::class, 'active_vendor'])->name('admin/active-vendor');

		//Importer Controller
		Route::resource('importer', App\Http\Controllers\Admin\ImporterController::class);
		Route::get('admin/inactive-importer/{id}', [App\Http\Controllers\Admin\ImporterController::class, 'inactive_importer'])->name('admin/inactive-importer');
		Route::get('admin/active-importer/{id}', [App\Http\Controllers\Admin\ImporterController::class, 'active_importer'])->name('admin/active-importer');

		//Merchant Controller
		Route::resource('merchant', App\Http\Controllers\Admin\MerchantController::class);
		Route::get('admin/inactive-merchant/{id}', [App\Http\Controllers\Admin\MerchantController::class, 'inactive_merchant'])->name('admin/inactive-merchant');
		Route::get('admin/active-merchant/{id}', [App\Http\Controllers\Admin\MerchantController::class, 'active_merchant'])->name('admin/active-merchant');

		//Customer Controller
		Route::resource('customer', CustomerController::class);
		Route::get('admin/inactive-customer/{id}', [CustomerController::class, 'inactive_customer'])->name('admin/inactive-customer');
		Route::get('admin/active-customer/{id}', [CustomerController::class, 'active_customer'])->name('admin/active-customer');

		//Withdraw Controller
		Route::resource('withdraw', WithdrawController::class);	
		Route::get('admin/inactive-withdraw/{id}', [WithdrawController::class, 'inactive_withdraw'])->name('admin/inactive-withdraw');
		Route::get('admin/active-withdraw/{id}', [WithdrawController::class, 'active_withdraw'])->name('admin/active-withdraw');

		Route::post('bulk-approve-withdraw-request', [WithdrawController::class, 'bulk_approve'])->name('admin/bulk-approve-withdraw-request');

		//Post Controller
		Route::resource('post', PostController::class);	



		//Ajax Request
		Route::post('admin/get-subcategory', [ProsubcategoryController::class, 'get_subcategory'])->name('admin/get-subcategory');
		Route::post('admin/get-prosubcategory', [ProductController::class, 'get_prosubcategory'])->name('admin/get-prosubcategory');

		Route::post('admin/get-attribute-value', [AttributeController::class, 'get_attribute_value'])->name('admin/get-attribute-value');
	});

});


//Vendor Route
Route::group(['prefix' => 'vendor'], function(){
	Route::group(['middleware'=>'vendor.guest'], function(){
		Route::get('login', [VendorController::class, 'loginForm'])->name('vendor.login');
		Route::post('login', [VendorController::class, 'login'])->name('vendor.auth');
	});

	Route::group(['middleware'=>'vendor.auth'], function(){
		Route::get('dashboard', [VendorController::class, 'dashboard'])->name('vendor.home');		
		Route::post('logout', [VendorController::class, 'logout'])->name('vendor.logout');

		//Attribute Controller
		Route::resource('attribute', App\Http\Controllers\Vendor\AttributeController::class);

		//Attribute Controller
		Route::resource('attribute_value', App\Http\Controllers\Vendor\AttributeValueController::class);
		//Product Controller
		Route::resource('product', App\Http\Controllers\Vendor\ProductController::class);

		//Withdraw Controller
		Route::resource('withdraw', App\Http\Controllers\Vendor\WithdrawController::class);	

		//Order Controller
		Route::resource('order', App\Http\Controllers\Vendor\OrderController::class);	
		Route::get('vendor/invoice-print/{id}', [App\Http\Controllers\Vendor\OrderController::class, 'invoice_print'])->name('vendor/invoice-print');		
		Route::post('vendor/update-shipping-address/{id}', [App\Http\Controllers\Vendor\OrderController::class, 'update_shipping_address'])->name('vendor/update-shipping-address');
		Route::post('vendor/update-order-summery/{id}', [App\Http\Controllers\Vendor\OrderController::class, 'update_order_summery'])->name('vendor/update-order-summery');

		Route::get('vendor/filter-order', [App\Http\Controllers\Vendor\OrderController::class, 'filter_order'])->name('vendor/filter-order');

		Route::resource('shop', App\Http\Controllers\Vendor\ShopController::class);
		Route::post('add-to-cart',  [App\Http\Controllers\Vendor\ShopController::class, 'add_to_cart'])->name('vendor/add-to-cart');
		Route::get('show-cart', [App\Http\Controllers\Vendor\ShopController::class, 'show_cart'])->name('vendor/show-cart');
		Route::get('update-cart', [App\Http\Controllers\Vendor\ShopController::class, 'update_cart'])->name('vendor/update-cart');
		Route::get('remove-from-cart/{rowId}', [App\Http\Controllers\Vendor\ShopController::class, 'remove_from_cart'])->name('vendor/remove-from-cart');
		Route::post('total-amount', [App\Http\Controllers\Vendor\ShopController::class, 'total_amount'])->name('vendor/total-amount');
		Route::post('submit-order', [App\Http\Controllers\Vendor\ShopController::class, 'submit_order'])->name('vendor/submit-order');
		Route::get('checkout', [App\Http\Controllers\Vendor\ShopController::class, 'checkout'])->name('vendor/checkout');

		// Route::get('checkout', [App\Http\Controllers\Vendor\ShopController::class, 'checkout'])->name('vendor/checkout');
		Route::get('order-history', [App\Http\Controllers\Vendor\ShopController::class, 'order_history'])->name('/order-history');


		Route::get('merchants', [VendorController::class, 'merchants'])->name('vendor/merchants');	
		Route::get('merchant-profile/{id}', [VendorController::class, 'merchant_profile'])->name('vendor/merchant-profile');		
		Route::get('send-message/{id}', [VendorController::class, 'send_message'])->name('vendor/send-message');		
		Route::post('message', [VendorController::class, 'message'])->name('vendor/message');
		Route::get('show-message/{id}', [VendorController::class, 'show_message'])->name('vendor/show-message');	
		Route::get('replay-message/{id}', [VendorController::class, 'replay_message'])->name('vendor/replay-message');	

		Route::post('replay/{id}', [VendorController::class, 'replay'])->name('vendor/replay');

		//Ajax Request
		Route::post('vendor/get-attribute-value', [App\Http\Controllers\Vendor\ProductController::class, 'get_attribute_value'])->name('vendor/get-attribute-value');

	});

});


//Importer Route
Route::group(['prefix' => 'importer'], function(){
	Route::group(['middleware'=>'importer.guest'], function(){
		Route::get('login', [ImporterController::class, 'loginForm'])->name('importer.login');
		Route::post('login', [ImporterController::class, 'login'])->name('importer.auth');
	});

	Route::group(['middleware'=>'importer.auth'], function(){
		Route::get('dashboard', [ImporterController::class, 'dashboard'])->name('importer.home');		
		Route::post('logout', [ImporterController::class, 'logout'])->name('importer.logout');

		//Attribute Controller
		Route::resource('attribute', App\Http\Controllers\Importer\AttributeController::class);

		//Attribute Value Controller
		Route::resource('attribute_value', App\Http\Controllers\Importer\AttributeValueController::class);

		//Product Controller
		Route::resource('product', App\Http\Controllers\Importer\ProductController::class);
		Route::resource('shop', App\Http\Controllers\Importer\ShopController::class);
		Route::get('remove-from-cart/{rowId}', [App\Http\Controllers\Importer\ShopController::class, 'remove_from_cart'])->name('importer/remove-from-cart');
		Route::post('add-to-cart',  [App\Http\Controllers\Importer\ShopController::class, 'add_to_cart'])->name('importer/add-to-cart');
		Route::get('show-cart', [App\Http\Controllers\Importer\ShopController::class, 'show_cart'])->name('importer/show-cart');
		Route::get('update-cart', [App\Http\Controllers\Importer\ShopController::class, 'update_cart'])->name('importer/update-cart');
		Route::get('checkout', [App\Http\Controllers\Importer\ShopController::class, 'checkout'])->name('importer/checkout');
		Route::post('total-amount', [App\Http\Controllers\Importer\ShopController::class, 'total_amount'])->name('importer/total-amount');
		Route::post('submit-order', [App\Http\Controllers\Importer\ShopController::class, 'submit_order'])->name('importer/submit-order');




		Route::resource('order', App\Http\Controllers\Importer\OrderController::class);	
		Route::get('filter-order', [App\Http\Controllers\Importer\OrderController::class, 'filter_order'])->name('importer/filter-order');

		Route::get('invoice-print/{id}', [App\Http\Controllers\Importer\OrderController::class, 'invoice_print'])->name('importer/invoice-print');

		Route::post('update-shipping-address/{id}', [App\Http\Controllers\Importer\OrderController::class, 'update_shipping_address'])->name('importer/update-shipping-address');
		Route::post('update-order-summery/{id}', [App\Http\Controllers\Importer\OrderController::class, 'update_order_summery'])->name('importer/update-order-summery');


		Route::get('order-history', [App\Http\Controllers\Importer\ShopController::class, 'order_history'])->name('importer/order-history');

		//Ajax Request
		Route::post('importer/get-attribute-value', [App\Http\Controllers\Vendor\ProductController::class, 'get_attribute_value'])->name('importer/get-attribute-value');

	});

});


//Merchant Route
Route::group(['prefix' => 'merchant'], function(){
	Route::group(['middleware'=>'merchant.guest'], function(){
		Route::get('login', [MerchantController::class, 'loginForm'])->name('merchant.login');
		Route::post('login', [MerchantController::class, 'login'])->name('merchant.auth');
	});

	Route::group(['middleware'=>'merchant.auth'], function(){
		Route::get('dashboard', [MerchantController::class, 'dashboard'])->name('merchant.home');		
		Route::post('logout', [MerchantController::class, 'logout'])->name('merchant.logout');

		Route::resource('order', App\Http\Controllers\Merchant\OrderController::class);	
		Route::get('merchant/invoice-print/{id}', [App\Http\Controllers\Merchant\OrderController::class, 'invoice_print'])->name('merchant/invoice-print');	

		Route::post('update-shipping-address/{id}', [App\Http\Controllers\Merchant\OrderController::class, 'update_shipping_address'])->name('merchant/update-shipping-address');
		Route::post('update-order-summery/{id}', [App\Http\Controllers\Merchant\OrderController::class, 'update_order_summery'])->name('merchant/update-order-summery');

		Route::get('filter-order', [App\Http\Controllers\Merchant\OrderController::class, 'filter_order'])->name('merchant/filter-order');

		//Withdraw Controller
		Route::resource('withdraw', App\Http\Controllers\Merchant\WithdrawController::class);	

		

		//Attribute Controller
		Route::resource('attribute', App\Http\Controllers\Merchant\AttributeController::class);

		//Attribute Value Controller
		Route::resource('attribute_value', App\Http\Controllers\Merchant\AttributeValueController::class);

		//Product Controller
		Route::resource('product', App\Http\Controllers\Merchant\ProductController::class);

		Route::get('vendors', [MerchantController::class, 'vendors'])->name('merchant/vendors');	
		Route::get('vendor-profile/{id}', [MerchantController::class, 'vendor_profile'])->name('merchant/vendor-profile');		
		Route::get('send-message/{id}', [MerchantController::class, 'send_message'])->name('merchant/send-message');	
		Route::post('message', [MerchantController::class, 'message'])->name('merchant/message');


		Route::get('show-message/{id}', [MerchantController::class, 'show_message'])->name('merchant/show-message');
		Route::get('vendor-replay/{id}', [MerchantController::class, 'vendor_replay'])->name('merchant/vendor-replay');	

		Route::resource('shop', App\Http\Controllers\Merchant\ShopController::class);

		Route::post('add-to-cart',  [App\Http\Controllers\Merchant\ShopController::class, 'add_to_cart'])->name('merchant/add-to-cart');
		Route::get('show-cart', [App\Http\Controllers\Merchant\ShopController::class, 'show_cart'])->name('merchant/show-cart');
		Route::get('update-cart', [App\Http\Controllers\Merchant\ShopController::class, 'update_cart'])->name('merchant/update-cart');
		Route::get('remove-from-cart/{rowId}', [App\Http\Controllers\Merchant\ShopController::class, 'remove_from_cart'])->name('merchant/remove-from-cart');
		Route::get('checkout', [App\Http\Controllers\Merchant\ShopController::class, 'checkout'])->name('merchant/checkout');
		Route::post('total-amount', [App\Http\Controllers\Merchant\ShopController::class, 'total_amount'])->name('merchant/total-amount');
		Route::post('submit-order', [App\Http\Controllers\Merchant\ShopController::class, 'submit_order'])->name('merchant/submit-order');

		Route::get('order-history', [App\Http\Controllers\Merchant\ShopController::class, 'order_history'])->name('merchant/order-history');





		//Ajax Request
		Route::post('merchant/get-attribute-value', [App\Http\Controllers\Merchant\ProductController::class, 'get_attribute_value'])->name('merchant/get-attribute-value');


	});

});
