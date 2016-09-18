<?php

namespace Treats\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class UserRegistrationRequest extends FormRequest {

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {

    return true;

  } // authorize

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {

    return [
        'first_name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
        'address' => 'required|max:255',
        'city' => 'required|max:255',
        'state' => 'required|max:255',
        'country' => 'required|max:10',
        'zip' => 'required|numeric'
    ];

  } // rules

  /**
   * Get the proper failed validation response for the request.
   *
   * @param  array  $errors
   * @return \Symfony\Component\HttpFoundation\Response
   */
  public function response( array $errors ) {

      return new JsonResponse( array_merge( [ 'error' => 'validation' ], $errors ), 422 );

  } // response

} // UserRegistrationRequest
