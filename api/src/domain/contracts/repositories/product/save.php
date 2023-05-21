<?php

namespace Src\Domain\Contract\Repositories\Product;

use Src\Infra\Repositories\Postgres\Models\Product;

interface ISaveProduct
{
  public function save(mixed $data): ?Product;
}
