<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
	protected $fillable = [
		'detailName','detailPrice','detailQuantity',
    ];

    public function order()
    {
    	return $this->belongsTo('App\Order');
    }
    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
