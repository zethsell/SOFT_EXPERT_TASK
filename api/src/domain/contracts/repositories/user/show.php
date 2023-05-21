<?php

namespace Src\Domain\Contract\Repositories\User;

use Src\Infra\Repositories\Postgres\Models\User;

interface IShowUser
{
  public function show(int $id): ?User;
}
