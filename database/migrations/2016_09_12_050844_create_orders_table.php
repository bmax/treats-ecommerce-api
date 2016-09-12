<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {

    Schema::create( 'orders', function ( Blueprint $table ) {
        $table->increments( 'id' );
        $table->integer( 'user_id' );
        $table->timestamp( 'order_date' );
        $table->float( 'sales_tax' );
        $table->float( 'price' );
        $table->integer( 'discount_id' );
        $table->float( 'total' );
        $table->timestamp( 'payment_date' )->nullable();
        $table->integer( 'status' );
        $table->timestamps();
    } );


  } // up

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {

    Schema::drop( 'orders' );

  } // down

} // CreateOrdersTable
