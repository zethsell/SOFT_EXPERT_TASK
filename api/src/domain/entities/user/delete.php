<?php

namespace Src\Domain\Entities\User;

use Src\Domain\Contract\Repositories\User\IDeleteUser as IDelete;

interface IDeleteUser
{
  public function __construct(IDelete $repo);
  public function setupDeleteUser($params): void;
}
