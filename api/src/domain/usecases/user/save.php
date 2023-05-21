<?php

namespace Src\Domain\Usecases\User;

use Src\Application\Errors\ContentNotFound;
use Src\Domain\Contract\Gateways\IEncrypter;
use Src\Domain\Contract\Repositories\User\ISaveUser as ISave;
use Src\Domain\Entities\User\ISaveUser;
use Src\Infra\Repositories\Postgres\Models\User;

class SaveUser implements ISaveUser
{
  public function __construct(private ISave $repo, private IEncrypter $crypt)
  {
  }

  public function setupSaveUser($params): User
  {
    if (isset($params['password'])) {
      $params['password'] = $this->crypt->encrypt($params['password']);
    }
    $user =  $this->repo->save($params);
    if ($user) {
      return $user;
    }
    throw new ContentNotFound('user');
  }
}
