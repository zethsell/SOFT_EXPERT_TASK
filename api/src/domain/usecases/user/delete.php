<?php

namespace Src\Domain\Usecases\User;

use Src\Domain\Contract\Repositories\User\IDeleteUser as IDelete;
use Src\Domain\Entities\User\IDeleteUser;

class DeleteUser implements IDeleteUser
{
  public function __construct(private IDelete $repo)
  {
  }

  public function setupDeleteUser($params): void
  {
    $this->repo->delete($params['id']);
  }
}
