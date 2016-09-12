<?php

namespace Treats\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Treats\Models\Categorey;

class Product extends Model {

  protected $hidden    = [ 'created_at', 'updated_at' ];
  protected $guarded   = [ 'id' ];

  public function category() {

    return $this->belongsTo( Categorey::class );

  } // category

} // Product
