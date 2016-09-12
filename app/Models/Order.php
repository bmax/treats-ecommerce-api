<?php

namespace Treats\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Treats\Models\Product;

class Order extends Model {

  protected $hidden    = [ 'created_at', 'updated_at' ];
  protected $guarded   = [ 'id' ];

  public function products() {

    return $this->belongsToMany( Product::class );

  } // products

} // Order
