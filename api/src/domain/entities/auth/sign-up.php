<?php

namespace Src\Domain\Entities\Auth;

use Src\Domain\Contract\Gateways\IEncrypter;
use Src\Domain\Contract\Repositories\User\ISaveUser;

interface ISignUp
{
  public function __construct(ISaveUser $repo, IEncrypter $crypt);
  public function setupSignUp(?array $params): void;
}
