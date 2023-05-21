<?php

namespace Src\Main\Factories\Domain\Usecases\Auth;

use Src\Main\Factories\Factory;
use Src\Domain\Usecases\Auth\SignIn;
use Src\Main\Factories\Infra\Gateways\MakeCryptHandler;
use Src\Main\Factories\Infra\Gateways\MakeJwtHandler;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeUserRepository;

class MakeSetupSignIn extends Factory
{
  public static function make()
  {
    return new SignIn(
      MakeUserRepository::make(),
      MakeCryptHandler::make(),
      MakeJwtHandler::make()
    );
  }
}
