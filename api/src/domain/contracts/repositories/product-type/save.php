<?php

namespace Src\Domain\Contract\Repositories\ProductType;

use Src\Infra\Repositories\Postgres\Models\ProductType;

interface ISaveProductType
{
  public function save(mixed $data): ?ProductType;
}
