<?php

namespace Src\Infra\Repositories\Postgres\Models;

use Illuminate\Database\Eloquent\Model;
use Src\Infra\Repositories\Postgres\Models\Traits\SoftDeletes;

class ProductType extends Model
{
  use SoftDeletes;

  protected $table = 'product_types';
  protected $fillable = ['id', 'description'];
  protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'pivot'];

  public function taxes()
  {
    return $this->belongsToMany(Tax::class, 'product_type_taxes',  'product_type_id', 'tax_id');
  }
}
