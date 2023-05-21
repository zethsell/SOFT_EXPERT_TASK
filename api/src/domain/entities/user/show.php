<?php

namespace Src\Domain\Entities\User;

use Src\Domain\Contract\Repositories\User\IShowUser as IShow;
use Src\Infra\Repositories\Postgres\Models\User;

interface IShowUser
{
  public function __construct(IShow $repo);
  public function setupShowUser($params): User;
}
