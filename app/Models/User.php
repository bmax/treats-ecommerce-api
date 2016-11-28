<?php

namespace Treats\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Cashier\Billable;
use Treats\Models\User;

class User extends Model {

  use Billable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'first_name', 'last_name', 'email', 'password', 'address', 'city', 'state', 'country', 'zip'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'authorization_token',
  ];

  public static function findUserByAuthToken( string $auth_token ) {

    return self::where( 'authorization_token', $auth_token )->first();

  } // findUserByAuthToken

  public function toArrayWithAuthTokenAndClientToken( string $auth_token, string $client_token ) {

    return array_merge( $this->toArray(), [ 'authorization_token' => $auth_token, 'braintree_token' => $client_token ] );

  } // findUserByAuthToken

  public static function findUserByEmail( string $email ) {

    return self::where( 'email', $email )->first();

  } // findUserByEmail

  public static function logUserIn( User $user, string $password, string $ip ) {

    if ( Hash::check( $password, $user->password ) ) {

      if ( Hash::needsRehash( $user->password ) ) {
        $user->password = Hash::make( $password );
      }

      $user->authorization_token = md5( serialize( $user ) );
      $user->last_used_ip        = $ip;
      $user->save();

      return $user->authorization_token;

    } // if password matches

    return false;

  } // logUserIn

} // User
