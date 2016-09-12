<?php

namespace Treats\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class ProductsRequest extends FormRequest {

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
        'name' => 'required',
        'sku'  => 'required',
        'description' => 'required',
        'category_id' => 'required|integer|exists:categories,id',
        'quantity_in_stock' => 'required|integer',
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

} // ProductsRequest
