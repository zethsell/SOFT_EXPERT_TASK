<?php

namespace Src\Infra\Repositories\Postgres;

use Src\Domain\Contract\Repositories\ProductSell\ISaveProductSell;
use Src\Infra\Repositories\Postgres\Models\ProductSell;

class ProductSellRepository implements ISaveProductSell
{
  public function save($data): array
  {
    return array_map(fn ($detail) => ProductSell::create($detail), $data);
  }
}
