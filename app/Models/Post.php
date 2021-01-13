<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
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
    
}
