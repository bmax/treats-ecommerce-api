<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
  public function run() {

    DB::table( 'users' )->insert( [
        'first_name' => str_random( 10 ),
        'last_name' => str_random( 10 ),
        'address' => str_random( 10 ) . ' test rd',
        'city'       => 'New York',
        'state'      => 'New York',
        'country'    => 'USA',
        'zip'        => '10011',
        'email' => str_random( 10 ) . '@gmail.com',
        'password' => Hash::make( 'secret' ),
    ] ) ;

    DB::table( 'users' )->insert( [
        'first_name' => 'Admin',
        'last_name'  => 'Max',
        'address'    => 'bla bla rd',
        'city'       => 'New York',
        'state'      => 'New York',
        'country'    => 'USA',
        'zip'        => '10028',
        'email' => 'admin@gmail.com',
        'password' => Hash::make( 'password' ),
        'authorization_token' => 'testtest',
        'admin' => 1
    ] );

  } // run

} // UsersTableSeeder
