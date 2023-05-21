<?php

namespace Src\Domain\Contract\Repositories\Sell;

use Src\Infra\Repositories\Postgres\Models\Sell;

interface ISaveSell
{
  public function save(mixed $data): ?Sell;
}
