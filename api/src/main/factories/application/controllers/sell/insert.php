<?php

namespace Src\Main\Factories\Application\Controllers\Sell;

use Src\Application\Controllers\Sell\InsertSellController;
use Src\Main\Factories\Domain\Usecases\Sell\MakeSetupSaveSell;
use Src\Main\Factories\Factory;

class MakeInsertSellController extends Factory
{
  public static function make()
  {
    return new InsertSellController(MakeSetupSaveSell::make());
  }
}
