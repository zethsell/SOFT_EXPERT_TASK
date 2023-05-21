<?php

namespace Src\Infra\Repositories\Postgres\Models;

use Illuminate\Database\Eloquent\Model;
use Src\Infra\Repositories\Postgres\Models\Traits\SoftDeletes;

class Sell extends Model
{
  use SoftDeletes;

  protected $table = 'sells';
  protected $fillable = ['id', 'created_at'];
  protected $hidden = ['updated_at', 'deleted_at'];

  public function details()
  {
    return $this->hasMany(ProductSell::class, 'sell_id');
  }
}
