<?php

namespace Src\Domain\Contract\Repositories\Tax;

use Src\Infra\Repositories\Postgres\Models\Tax;

interface ISaveTax
{
  public function save(mixed $data): ?Tax;
}
