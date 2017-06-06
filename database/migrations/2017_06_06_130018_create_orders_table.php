<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
              ->references('id')->on('users')
              ->onDelete('cascade');

            $table->float('orderAmount');
            $table->string('orderShipName'); 
            $table->string('orderShipAdress'); 
            $table->string('orderShipAdress2')->nullable(); 
            $table->string('orderCity'); 
            $table->string('orderState'); 
            $table->string('orderZip'); 
            $table->string('orderCountry'); 
            $table->string('orderPhone'); 
            $table->string('orderEmail');
            $table->string('orderFax'); 

            $table->float('orderShipping');
            $table->float('orderTax');
           

            $table->char('orderShipped',1);//YN
            $table->string('orderTrackingNumber');


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
        Schema::dropIfExists('orders');
    }
}
