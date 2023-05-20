<?php

namespace Src\Main\Factories\Application\Controllers\Auth;

use Src\Application\Controllers\Auth\SignInController;
use Src\Main\Factories\Domain\Usecases\Auth\MakeSetupSignIn;
use Src\Main\Factories\Factory;

class MakeSignInController extends Factory
{
  public static function make()
  {
    return new SignInController(MakeSetupSignIn::make());
  }
}
