<?php

namespace Src\Main\Factories\Infra\Repositories\Postgres;

use Src\Main\Factories\Factory;
use Src\Infra\Repositories\Postgres\UserRepository;

class MakeUserRepository extends Factory
{
  public static function make()
  {
    return new UserRepository();
  }
}
