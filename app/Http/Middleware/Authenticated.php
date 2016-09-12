<?php

namespace Treats\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Treats\Http\Controllers\BaseAuthenticatedController;
use Treats\Models\User;

class Authenticated extends BaseAuthenticatedController {

  const AUTHORIZATION_HEADER_PREFIX = 'Bearer';

  protected $_user;

  /**
   * Run the request filter.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle( $request, Closure $next ) {

    if ( !$request->hasHeader( 'Authorization' ) ) {
      return $this->_responseError( "Unauthorized", Response::HTTP_UNAUTHORIZED );
    }

    $authorization_token = $request->bearerToken();

    if ( !$authorization_token ) {
      return $this->_responseError( "Malformed Authorization header" );
    }

    $user = User::findUserByAuthToken( $authorization_token );

    if ( !$user ) {
      return $this->_responseError( "Unauthorized", Response::HTTP_UNAUTHORIZED );
    }

    $request->attributes->add( [ 'user' => $user ] );

    return $next( $request );

  } // handle

} // Authenticated
