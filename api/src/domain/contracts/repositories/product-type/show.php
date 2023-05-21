<?php

namespace Src\Domain\Contract\Repositories\ProductType;

use Src\Infra\Repositories\Postgres\Models\ProductType;

interface IShowProductType
{
  public function show(int $id): ?ProductType;
}
