<?php

namespace Treats\Http\Controllers;

use Illuminate\Http\Request;
use Treats\Http\Requests;
use Treats\Http\Requests\ProductsRequest;
use Treats\Models\Products;

class ProductsController extends BaseAuthenticatedController {

  public function list( $params = null ) {

    return $this->_response( Products::with( 'category' )->get() );

  } // list

  public function get( $id ) {

    return $this->_response( Products::with( 'category' )->find( $id ) );

  } // get

  public function store( ProductsRequest $request ) {

    $name       = $request->input( 'name' );
    $sku         = $request->input( 'sku' );
    $desc        = $request->input( 'description' );
    $category_id = $request->input( 'category_id' );
    $quantity    = $request->input( 'quantity_in_stock' );
    $sizes       = $request->input( 'sizes' );

    $product = Products::create( [ 'name' => $name, 'sku' => $sku, 'description' => $desc, 'category_id' => $category_id, 'quantity_in_stock' => $quantity, 'sizes' => $sizes ] );

    return $this->_response( $product );

  } // store

} // ProductsController
