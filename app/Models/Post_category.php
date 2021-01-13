<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_category extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo('App\models\Category', 'category_id');
    }

}
