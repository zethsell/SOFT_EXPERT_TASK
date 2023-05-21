<?php

namespace Src\Main\Factories\Domain\Usecases\User;

use Src\Domain\Usecases\User\ShowUser;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeUserRepository;

class MakeSetupShowUser extends Factory
{
  public static function make()
  {
    return new ShowUser(MakeUserRepository::make());
  }
}
