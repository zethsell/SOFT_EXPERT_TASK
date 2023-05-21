<?php

namespace Src\Main\Factories\Application\Controllers\User;

use Src\Application\Controllers\User\ListUsersController;
use Src\Main\Factories\Domain\Usecases\User\MakeSetupListUsers;
use Src\Main\Factories\Factory;

class MakeListUsersController extends Factory
{
  public static function make()
  {
    return new ListUsersController(MakeSetupListUsers::make());
  }
}
