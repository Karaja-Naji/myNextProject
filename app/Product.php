<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'weight', 'shortdesc', 'thumb', 'category_id','cartdesc',
        'longdesc','stock', 'location'
    ];
    //protected $guarded = ['price'];

    public function images()
    {
    	return $this->hasMany('App\Image');
    }
    public function category()
    {
    	return $this->belongsTo('App\Category', 'category_id');
    }

    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }
}
