<?php

namespace Src\Main\Factories\Application\Controllers\User;

use Src\Application\Controllers\User\UpdateUserController;
use Src\Main\Factories\Domain\Usecases\User\MakeSetupSaveUser;
use Src\Main\Factories\Factory;

class MakeUpdateUserController extends Factory
{
  public static function make()
  {
    return new UpdateUserController(MakeSetupSaveUser::make());
  }
}
