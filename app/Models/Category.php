<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
	public function subcategories(){
		return $this->hasMany('App\models\Subcategory', 'category_id');
	}	

	public function prosubcategories(){
		return $this->hasMany('App\models\Prosubcategory', 'category_id');
	}

	public function product(){
		return $this->hasMany('App\models\Product', 'category_id');
	}

	public function post(){
		return $this->hasMany('App\models\Post', 'category_id');
	}
    public function parent(){
        return $this->belongsTo('App\models\Category', 'parent_id');
    }
	public function product_category(){
		return $this->hasMany('App\Models\Product_category', 'category_id');
	}	

	public function post_category(){
		return $this->hasMany('App\Models\Post_category', 'category_id');
	}	

}
