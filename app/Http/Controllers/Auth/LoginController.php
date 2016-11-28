<?php

namespace Treats\Http\Controllers\Auth;

use Illuminate\Support\Facades\DB;
use Treats\Http\Controllers\Controller;
use Treats\Http\Requests\LoginRequest;
use Treats\Models\User;

class LoginController extends Controller {

  public function store( LoginRequest $request ) {

    $email    = $request->input( 'email' );
    $password = $request->input( 'password' );

    $user     = User::findUserByEmail( $email );

    if ( !$user ) {
      return $this->_responseError( 'Invalid login', 401 );
    }

    $auth_token = User::logUserIn( $user, $password, $request->ip() );

    if ( !$auth_token ) {
      return $this->_responseError( 'Invalid login', 401 );
    }
    $braintree_id_config = $user->braintree_id ? [
      "customerId" => $user->braintree_id
    ] : null;
    $client_token = \Braintree_ClientToken::generate( $braintree_id_config );

    return $this->_response( $user->toArrayWithAuthTokenAndClientToken( $auth_token, $client_token ) );

  } // store

} // LoginController
