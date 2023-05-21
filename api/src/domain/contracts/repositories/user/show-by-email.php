<?php

namespace Src\Domain\Contract\Repositories\User;

use Src\Infra\Repositories\Postgres\Models\User;

interface IShowUserByEmail
{
  public function showByEmail(mixed $data): ?User;
}
