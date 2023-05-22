<?php

namespace Src\Infra\Repositories\Postgres\Models;

use Illuminate\Database\Eloquent\Model;
use Src\Infra\Repositories\Postgres\Models\Traits\SoftDeletes;

class Tax extends Model
{
  use SoftDeletes;

  protected $table = 'taxes';
  protected $fillable = ['id', 'value', 'description'];
  protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'pivot'];
}
