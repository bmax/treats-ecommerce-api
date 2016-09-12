<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
  public function run() {

    DB::table( 'products' )->insert( [
        'name' => 'Product 1',
        'sku' =>  '12512dx33',
        'description' => 'TEST PRODUCT',
        'category_id' => 1,
        'quantity_in_stock' => 2,
        'sizes'             => 'S, M, L (unsure of how to use this)',
    ] );

  } // run

} // ProductsTableSeeder
