<?php

namespace Src\Domain\Contract\Repositories\Product;

use Src\Infra\Repositories\Postgres\Models\Product;

interface IShowProduct
{
  public function show(int $id): ?Product;
}
