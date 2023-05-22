<?php

namespace Src\Domain\Usecases\Auth;

use Src\Domain\Contract\Gateways\IEncrypter;
use Src\Domain\Contract\Repositories\User\ISaveUser;
use Src\Domain\Entities\Auth\ISignUp;

class SignUp implements ISignUp
{
  public function __construct(private ISaveUser $repo, private IEncrypter $crypt)
  {
  }

  public function setupSignUp($params): void
  {
    $hashedPassword = $this->crypt->encrypt($params['password']);
    $this->repo->save([
      'password' => $hashedPassword,
      'name' => $params['name'],
      'email' => $params['email']
    ]);
  }
}
