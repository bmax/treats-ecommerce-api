<?php

namespace Treats\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Categories extends Model {

    protected $hidden = array('category_id', 'created_at', 'updated_at');

} // Categories
