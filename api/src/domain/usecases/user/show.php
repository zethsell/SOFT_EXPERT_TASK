<?php

namespace Src\Domain\Usecases\User;

use Src\Application\Errors\ContentNotFound;
use Src\Domain\Contract\Repositories\User\IShowUser as IShow;
use Src\Domain\Entities\User\IShowUser;
use Src\Infra\Repositories\Postgres\Models\User;

class ShowUser implements IShowUser
{
  public function __construct(private IShow $repo)
  {
  }

  public function setupShowUser($params): User
  {
    $user = $this->repo->show($params['id']);
    if ($user) {
      return $user;
    }
    throw new ContentNotFound('user');
  }
}
