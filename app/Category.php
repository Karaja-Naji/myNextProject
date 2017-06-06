<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public $timestamps = false;

    protected $fillable = [
        'title',
    ];

    public function product()
    {
    	return $this->hasMany('App\Product', 'category_id');
    }
}
