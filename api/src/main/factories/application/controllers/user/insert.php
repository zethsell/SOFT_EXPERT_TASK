<?php

namespace Src\Main\Factories\Application\Controllers\User;

use Src\Application\Controllers\User\InsertUserController;
use Src\Main\Factories\Domain\Usecases\User\MakeSetupSaveUser;
use Src\Main\Factories\Factory;

class MakeInsertUserController extends Factory
{
  public static function make()
  {
    return new InsertUserController(MakeSetupSaveUser::make());
  }
}
