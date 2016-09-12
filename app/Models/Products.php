<?php

namespace Treats\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Treats\Models\Categories;

class Products extends Model {

  protected $hidden    = [ 'created_at', 'updated_at' ];
  protected $guarded   = [ 'id' ];

  public function category() {

    return $this->belongsTo( Categories::class );

  } // category

} // Products
