<?php

namespace Src\Domain\Entities\Auth;

use Error;
use Src\Domain\Contract\Gateways\IEncrypter;
use Src\Domain\Contract\Gateways\ITokenGenerator;
use Src\Domain\Contract\Repositories\User\IShowUserByEmail;

interface ISignIn
{
  public function __construct(IShowUserByEmail $repo, IEncrypter $crypt, ITokenGenerator $token);
  public function setupSignIn($params): array | Error;
}
