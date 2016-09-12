<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {

    Schema::create( 'products', function ( Blueprint $table ) {
        $table->increments( 'id' );
        $table->string( 'sku', 20 );
        $table->string( 'name' );
        $table->longText( 'description' );
        $table->string( 'category_id' );
        $table->string( 'quantity_in_stock' );
        $table->string( 'sizes' )->nullable();
        $table->timestamps();
    } );


  } // up

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {

    Schema::drop( 'products' );

  } // down

} // CreateProductsTable
