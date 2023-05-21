<?php

namespace Src\Domain\Usecases\User;

use Src\Application\Errors\ContentNotFound;
use Src\Domain\Contract\Repositories\User\IShowUser;
use Src\Domain\Entities\User\ILoggedUser;
use Src\Infra\Repositories\Postgres\Models\User;
use Src\Main\Config\Auth;

class LoggedUser implements ILoggedUser
{
  public function __construct(private IShowUser $repo)
  {
  }

  public function setupLoggedUser(): User
  {
    $user = $this->repo->show(Auth::user()->id);
    if ($user) {
      unset($user['password']);
      return $user;
    }
    throw new ContentNotFound('user');
  }
}
