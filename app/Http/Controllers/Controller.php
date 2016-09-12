<?php

namespace Treats\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {

  protected function _response( $message = null, $http_response_code = Response::HTTP_OK ) {

    return response()->json( $message )->setStatusCode( $http_response_code );

  } // _response

  protected function _responseAuthenticated( $token, $http_response_code = Response::HTTP_OK ) {

    return response()->json( $message )->setStatusCode( $http_response_code )->cookie( 'at', $token, 120 );

  } // _responseAuthenticated

  protected function _responseError( $message, $http_response_code = Response::HTTP_BAD_REQUEST ) {

    return $this->_response( [ 'error' => $message ], $http_response_code );

  } // _responseError

} // Controller
