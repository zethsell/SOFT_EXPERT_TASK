<?php

namespace Src\Domain\Entities\User;

use Src\Domain\Contract\Repositories\User\IShowUser;
use Src\Infra\Repositories\Postgres\Models\User;

interface ILoggedUser
{
  public function __construct(IShowUser $repo);
  public function setupLoggedUser(): User;
}
