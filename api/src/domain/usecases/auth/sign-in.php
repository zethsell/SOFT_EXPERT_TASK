<?php

namespace Src\Domain\Usecases\Auth;

use Error;
use Src\Domain\Contract\Gateways\IEncrypter;
use Src\Domain\Contract\Gateways\ITokenGenerator;
use Src\Domain\Contract\Repositories\User\IShowUserByEmail;
use Src\Domain\Entities\Auth\ISignIn;
use Src\Domain\Errors\AuthenticationError;
use Src\Infra\Repositories\Postgres\Models\User;

class SignIn implements ISignIn
{
  public function __construct(
    private IShowUserByEmail $repo,
    private IEncrypter $crypt,
    private ITokenGenerator $token
  ) {
  }

  public function setupSignIn($params): array | Error
  {
    $user = $this->repo->showByEmail($params['email']);
    if (!isset($user?->password)) {
      throw new AuthenticationError();
    }

    $compare = $this->crypt->compare($params['password'], $user['password']);
    if (!$compare) {
      throw new AuthenticationError();
    }

    $accessToken = $this->token->generate($user->toArray());
    return compact('accessToken');
  }
}
