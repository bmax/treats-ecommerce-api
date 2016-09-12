<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {

      Schema::create( 'users', function ( Blueprint $table ) {
          $table->increments( 'id' );
          $table->string( 'first_name' );
          $table->string( 'last_name' );
          $table->string( 'email' )->unique();
          $table->string( 'password' );
          $table->string( 'authorization_token' )->nullable();
          $table->integer( 'admin' )->default( 0 );
          $table->integer( 'confirmed_email' )->default( 0 );
          $table->string( 'last_used_ip', 40 )->nullable();
          $table->string( 'address', 200 );
          $table->string( 'address2', 200 )->nullable();
          $table->string( 'city', 200 );
          $table->string( 'state', 200 );
          $table->string( 'zip', 200 );
          $table->string( 'country', 200 );
          $table->timestamps();
      } );

  } // up

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {

      Schema::drop( 'users' );

  } // down

} // CreateUsersTable
