<?php

namespace Src\Domain\Usecases\User;

use Src\Domain\Contract\Repositories\User\IListUser;
use Src\Domain\Entities\User\IListUsers;


class ListUsers implements IListUsers
{
  public function __construct(private IListUser $repo)
  {
  }

  public function setupListUsers(): array
  {
    return $this->repo->list();
  }
}
