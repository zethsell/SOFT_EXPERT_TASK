<?php

namespace Src\Domain\Contract\Repositories\Sell;

use Src\Infra\Repositories\Postgres\Models\Sell;

interface IShowSell
{
  public function show(int $id): ?Sell;
}
