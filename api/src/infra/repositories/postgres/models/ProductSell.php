<?php

namespace Src\Infra\Repositories\Postgres\Models;

use Illuminate\Database\Eloquent\Model;
use Src\Infra\Repositories\Postgres\Models\Traits\SoftDeletes;

class ProductSell extends Model
{
  use SoftDeletes;

  protected $table = 'products_sells';
  protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
  protected $fillable = [
    'id',
    'tax',
    'value',
    'quantity',
    'product_id',
    'sell_id',
  ];

  public function product()
  {
    return $this->belongsTo(Product::class);
  }
}
