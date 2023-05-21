<?php

namespace Src\Main\Factories\Application\Controllers\User;

use Src\Application\Controllers\User\LoggedUserController;
use Src\Main\Factories\Domain\Usecases\User\MakeSetupLoggedUser;
use Src\Main\Factories\Factory;

class MakeLoggedUserController extends Factory
{
  public static function make()
  {
    return new LoggedUserController(MakeSetupLoggedUser::make());
  }
}
