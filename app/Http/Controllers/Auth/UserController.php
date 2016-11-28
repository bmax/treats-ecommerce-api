<?php

namespace Treats\Http\Controllers\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Treats\Http\Controllers\Controller;
use Treats\Http\Requests\UserRegistrationRequest;
use Treats\Models\User;
use Braintree\Braintree_ClientToken;

class UserController extends Controller {

  public function store( UserRegistrationRequest $request ) {

    $inputs   = $request->all();
    $password = $inputs['password'];

    $inputs['password'] = Hash::make( $inputs['password'] );

    $user     = User::create( $inputs );
    if ( !$user ) {
      return $this->_responseError( 'Unable to create user', 402 );
    }

    $auth_token = User::logUserIn( $user, $password, $request->ip() );

    if ( !$auth_token ) {
      return $this->_responseError( 'some crazy problem, this really should not happen', 401 );
    }

    $braintree_id_config = $user->braintree_id ? [
      "customerId" => $user->braintree_id
    ] : null;

    $client_token = \Braintree_ClientToken::generate( $braintree_id_config );

    return $this->_response( $user->toArrayWithAuthTokenAndClientToken( $auth_token, $client_token ) );

  } // store

} // UserController
