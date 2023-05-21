<?php

namespace Src\Infra\Repositories\Postgres\Models\Traits;

trait SoftDeletes
{

  public static function softDelete($id)
  {
    self::whereId($id)->update(['deleted_at' => date('Y-m-d')]);
  }

  public static function noTrash()
  {
    return self::whereNull('deleted_at');
  }
}
