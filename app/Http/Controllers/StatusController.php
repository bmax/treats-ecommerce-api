<?php

namespace Treats\Http\Controllers;

class StatusController extends BaseAuthenticatedController {

  public function index( $params = null ) {

    return $this->_response( $this->_getUser() );

  } // index

} // StatusController
