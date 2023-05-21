<?php

namespace Src\Main\Factories\Domain\Usecases\User;

use Src\Domain\Usecases\User\SaveUser;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Gateways\MakeCryptHandler;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeUserRepository;

class MakeSetupSaveUser extends Factory
{
  public static function make()
  {
    return new SaveUser(
      MakeUserRepository::make(),
      MakeCryptHandler::make()
    );
  }
}
