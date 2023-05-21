<?php

namespace Src\Domain\Contract\Repositories\User;

use Src\Infra\Repositories\Postgres\Models\User;

interface ISaveUser
{
  public function save(mixed $data): ?User;
}
