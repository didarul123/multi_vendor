<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prosubcategory extends Model
{
    use HasFactory;
	public function category(){
		return $this->belongsTo('App\Models\Category', 'category_id');
	}	
	public function subcategory(){
		return $this->belongsTo('App\Models\Subcategory', 'subcategory_id');
	}
	public function product(){
		return $this->hasMany('App\models\Product', 'prosubcategory_id');
	}
	public function post(){
		return $this->hasMany('App\models\Post', 'prosubcategory_id');
	}
}
