<?php

namespace Src\Main\Factories\Domain\Usecases\User;

use Src\Domain\Usecases\User\DeleteUser;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeUserRepository;

class MakeSetupDeleteUser extends Factory
{
  public static function make()
  {
    return new DeleteUser(MakeUserRepository::make());
  }
}
