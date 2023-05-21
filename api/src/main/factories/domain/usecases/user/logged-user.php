<?php

namespace Src\Main\Factories\Domain\Usecases\User;

use Src\Domain\Usecases\User\LoggedUser;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeUserRepository;

class MakeSetupLoggedUser extends Factory
{
  public static function make()
  {
    return new LoggedUser(MakeUserRepository::make());
  }
}
