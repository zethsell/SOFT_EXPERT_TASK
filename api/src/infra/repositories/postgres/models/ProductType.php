<?php

namespace Src\Infra\Repositories\Postgres\Models;

use Illuminate\Database\Eloquent\Model;
use Src\Infra\Repositories\Postgres\Models\Traits\SoftDeletes;

class ProductType extends Model
{
  use SoftDeletes;

  protected $table = 'product_types';
  protected $fillable = ['id', 'description', 'tax'];
  protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
