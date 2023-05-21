<?php

namespace Src\Domain\Entities\Auth;

use Src\Domain\Contract\Gateways\IEncrypter;
use Src\Domain\Contract\Repositories\User\ISaveUser;

interface ISignUp
{
  public function __construct(ISaveUser $repo, IEncrypter $crypt);
  /**
   * @param $params [name, password, email]
   */
  public function setupSignUp(?array $params): void;
}
