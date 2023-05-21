<?php

namespace Src\Main\Factories\Domain\Usecases\Auth;

use Src\Main\Factories\Factory;
use Src\Domain\Usecases\Auth\SignUp;
use Src\Main\Factories\Infra\Gateways\MakeCryptHandler;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeUserRepository;

class MakeSetupSignUp extends Factory
{
  public static function make()
  {
    return new SignUp(
      MakeUserRepository::make(),
      MakeCryptHandler::make()
    );
  }
}
