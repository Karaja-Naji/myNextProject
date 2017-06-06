<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $fillable = [
        'orderAmount', 'orderShipName','orderShipAdress','orderShipAdress2','orderCity',
		'orderState','orderZip','orderCountry','orderPhone','orderEmail','orderFax',
		'orderShipping','orderTax',
    ];

    public function orderDetails()
    {
    	return $this->hasMany('App\OrderDetail');
    }
}
