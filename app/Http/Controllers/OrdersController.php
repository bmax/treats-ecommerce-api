<?php

namespace Treats\Http\Controllers;

use Illuminate\Http\Request;
use Treats\Http\Requests;
use Treats\Models\Order;
use Treats\Models\Product;

class OrdersController extends BaseAuthenticatedController {

  public function list( $params = null ) {

    return $this->_response( Order::with( 'products' )->get() );

  } // list

  public function get( $id ) {

    return $this->_response( Order::with( 'products' )->find( $id ) );

  } // get

  public function charge( $id, Request $request ) {

    $user = $this->_getUser();
    $order = Order::find( $id );

    return $this->_response( $user->charge( 5, [ 'storeInVault' => true ] ) );

  } // charge

  // public function store( ProductsRequest $request ) {

  //   $name       = $request->input( 'name' );
  //   $sku         = $request->input( 'sku' );
  //   $desc        = $request->input( 'description' );
  //   $category_id = $request->input( 'category_id' );
  //   $quantity    = $request->input( 'quantity_in_stock' );
  //   $sizes       = $request->input( 'sizes' );

  //   $product = Product::create( [ 'name' => $name, 'sku' => $sku, 'description' => $desc, 'category_id' => $category_id, 'quantity_in_stock' => $quantity, 'sizes' => $sizes ] );

  //   return $this->_response( $product );

  // } // store

} // OrdersController
