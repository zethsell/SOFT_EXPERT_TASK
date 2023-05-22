<?php

namespace Src\Domain\Contract\Repositories\Tax;

use Src\Infra\Repositories\Postgres\Models\Tax;

interface IShowTax
{
  public function show(int $id): ?Tax;
}
