<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategoriesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
  public function run() {

    DB::table( 'categories' )->insert( [
        [ 'name' => 'Category 1' ], [ 'name' => 'Category 2' ]
    ] );

  } // run

} // CategoriesTableSeeder
