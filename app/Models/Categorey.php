<?php

namespace Treats\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Categorey extends Model {

  protected $table  = 'categories';
  protected $hidden = [ 'category_id', 'created_at', 'updated_at' ];

} // Categorey
