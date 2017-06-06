<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
              ->references('id')->on('categories')
              ->onDelete('cascade');

            $table->string('name');
            $table->float('price'); 
            $table->float('weight'); 
            $table->string('cartdesc')->nullable(); 
            $table->string('shortdesc'); 
            $table->text('longdesc')->nullable(); 

            $table->string('thumb')->nullable();  

            $table->float('stock')->nullable(); 
            $table->string('location')->nullable(); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
