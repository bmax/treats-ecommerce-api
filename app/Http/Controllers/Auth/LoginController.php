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

    return $this->_response( array_merge( $user->toArray(), [ 'authorization_token' => $auth_token ] ) );

  } // store

} // LoginController
