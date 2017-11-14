<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCat extends Model
{
    public function items(){
    	return $this->hasMany('App\Item', 'cat_id', 'id');
    }
}
