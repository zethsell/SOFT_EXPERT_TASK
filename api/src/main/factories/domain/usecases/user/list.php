<?php

namespace Src\Main\Factories\Domain\Usecases\User;

use Src\Domain\Usecases\User\ListUsers;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeUserRepository;

class MakeSetupListUsers extends Factory
{
  public static function make()
  {
    return new ListUsers(MakeUserRepository::make());
  }
}
