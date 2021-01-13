<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
	public function category(){
		return $this->belongsTo('App\Models\Category', 'category_id');
	}	    
	public function subcategory(){
		return $this->belongsTo('App\Models\Subcategory', 'subcategory_id');
	}
	public function prosubcategory(){
		return $this->belongsTo('App\Models\Prosubcategory', 'prosubcategory_id');
	}
	public function brand(){
		return $this->belongsTo('App\Models\Brand', 'brand_id');
	}	
	public function orderdetails(){
		return $this->hasMany('App\Models\OrderDetails', 'product_id');
	}

	public function attributes() {
		return $this->hasMany('App\Models\Product_attribute', 'product_id');
	}	
	

}
