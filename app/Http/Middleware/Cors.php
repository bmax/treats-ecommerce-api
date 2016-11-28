<?php

namespace Treats\Http\Middleware;

use Closure;

class Cors {

  public function handle( $request, Closure $next ) {

    $response = $next( $request );
    return $response
        ->header( 'Access-Control-Allow-Origin', '*' )
        ->header( 'Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS' )
        ->header( 'Access-Control-Allow-Headers', 'Origin, Content-Type, Authorization' );

  } // handle

} // Cors
