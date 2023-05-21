<?php

namespace Src\Infra\Repositories\Postgres\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = 'products';
  protected $fillable = ['id', 'description', 'value', 'type_id'];

  public function productType()
  {
    return $this->belongsTo(ProductType::class, 'type_id');
  }
}
