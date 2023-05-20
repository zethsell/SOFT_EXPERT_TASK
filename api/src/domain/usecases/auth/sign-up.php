<?php

namespace Src\Domain\Usecases\Auth;

use Src\Domain\Entities\Auth\ISignUp;

class SignUp implements ISignUp
{

  public function __construct(
    private string $name,
    private string $password,
    private string $email
  ) {
  }

  public function setupSignUp(): void
  {
  }
}
