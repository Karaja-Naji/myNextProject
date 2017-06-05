<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
	protected $table = 'productcategories';

    protected $fillable = [
        'title',
    ];

    public function product()
    {
    	return $this->belongsTo('App\Product', 'productcategory_id');
    }
}
