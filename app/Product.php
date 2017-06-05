<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'weight', 'shortdesc'
    ];

    public function images()
    {
    	return $this->hasMany('App\Image');
    }
    public function productCategory()
    {
    	return $this->hasOne('App\ProductCategory', 'productcategory_id');
    }
}
