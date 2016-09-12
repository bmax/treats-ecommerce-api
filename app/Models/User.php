<?php

namespace Treats\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Treats\Models\User;

class User extends Model {

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'email', 'password',
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
