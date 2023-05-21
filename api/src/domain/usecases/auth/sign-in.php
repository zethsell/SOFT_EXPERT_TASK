<?php

namespace Src\Domain\Usecases\Auth;

use Src\Domain\Entities\Auth\ISignIn;
use Src\Infra\Repositories\Postgres\Models\User;

class SignIn implements ISignIn
{

  // public function __construct()
  // {
  // }

  public function setupSignIn($params)
  {
    return $params;
  }
}
