<?php

namespace Src\Main\Factories\Domain\Usecases\Auth;

use Src\Main\Factories\Factory;
use Src\Domain\Usecases\Auth\SignIn;

class MakeSetupSignIn extends Factory
{
  public static function make()
  {
    return new SignIn();
  }
}
