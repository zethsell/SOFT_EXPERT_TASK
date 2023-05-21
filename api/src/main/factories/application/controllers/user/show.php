<?php

namespace Src\Main\Factories\Application\Controllers\User;

use Src\Application\Controllers\User\ShowUserController;
use Src\Main\Factories\Domain\Usecases\User\MakeSetupShowUser;
use Src\Main\Factories\Factory;

class MakeShowUserController extends Factory
{
  public static function make()
  {
    return new ShowUserController(MakeSetupShowUser::make());
  }
}
