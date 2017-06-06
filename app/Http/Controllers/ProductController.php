<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;
use App\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Product::with('category')
        //         ->get();

        $product = Product::with('category')
                    ->with("images")
                    ->orderBy('created_at','ASC')
                    ->get();

        if (!$product) {
            return response()->json([
                    "status" => "there is no product to show"
                ], 200);
        }

        return $product;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $category = Category::find($request->category_id);

        // $product = new Product($request->only(['name','price','weight','shortdesc']) );
 
        // if (!$category->product()->save($product)) {
        //     throw new HttpException(500);
        // }
        $imgsArray=array("firstLInk", "secondLink", "ThirdLink");

        $img = new Image( array('img'=>serialize($imgsArray)) );
        //return $img;

        $product = new Product($request->all());
        $product->save();

        //return $product;

        if (!$product->images()->save($img)) {
            throw new HttpException(500);
        }


        return response()->json([
                "status"=>"ok"
            ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('category')->find($id);

        if (!$product) {
            return response()->json([
                "status"=>"NO Product For This Id"
            ],200);
        }

        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        //$data=$request->only;
        // if (!$product->update($request->all())) {
        //     throw new HttpException(500);
        // }

        // return response()->json([
        //     "status"=>"OK"
        // ],200);
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        if (!$product->delete()) {
           throw new HttpException(500);
        }

        return response()->json([
            'status' => 'user deleted successfuly'
        ], 201);
    }
}
