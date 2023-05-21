<?php

namespace Src\Main\Factories\Application\Controllers\Sell;

use Src\Application\Controllers\Sell\ListSellsController;
use Src\Main\Factories\Domain\Usecases\Sell\MakeSetupListSells;
use Src\Main\Factories\Factory;

class MakeListSellsController extends Factory
{
  public static function make()
  {
    return new ListSellsController(MakeSetupListSells::make());
  }
}
