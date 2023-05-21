<?php

namespace Src\Main\Factories\Application\Controllers\Auth;

use Src\Application\Controllers\Auth\SignUpController;
use Src\Main\Factories\Domain\Usecases\Auth\MakeSetupSignUp;
use Src\Main\Factories\Factory;

class MakeSignUpController extends Factory
{
  public static function make()
  {
    return new SignUpController(MakeSetupSignUp::make());
  }
}
