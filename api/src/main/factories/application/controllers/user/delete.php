<?php

namespace Src\Main\Factories\Application\Controllers\User;

use Src\Application\Controllers\User\DeleteUserController;
use Src\Main\Factories\Domain\Usecases\User\MakeSetupDeleteUser;
use Src\Main\Factories\Factory;

class MakeDeleteUserController extends Factory
{
  public static function make()
  {
    return new DeleteUserController(MakeSetupDeleteUser::make());
  }
}
