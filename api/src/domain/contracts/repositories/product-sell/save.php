<?php

namespace Src\Domain\Contract\Repositories\ProductSell;

use Src\Infra\Repositories\Postgres\Models\ProductSell;

interface ISaveProductSell
{
  public function save(mixed $data): array;
}
