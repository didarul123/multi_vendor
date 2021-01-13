<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
	public function category(){
		return $this->belongsTo('App\Models\Category', 'category_id');
	}
	public function prosubcategories(){
		return $this->hasMany('App\models\Prosubcategory', 'subcategory_id');
	}
	public function product(){
		return $this->hasMany('App\models\Product', 'subcategory_id');
	}
	public function post(){
		return $this->hasMany('App\models\Post', 'subcategory_id');
	}
}
