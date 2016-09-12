<?php

namespace Treats\Http\Controllers;

use Illuminate\Http\Response;

class BaseAuthenticatedController extends Controller {

  public function __construct() {

    $this->middleware( 'authenticated' );

  } // __construct

  protected function _getUser() {

    if ( request()->attributes->has( 'user' ) ) {
      return request()->attributes->get( 'user' );
    }

  } // _getUser

} // BaseAuthenticatedController
