<?php

namespace Src\Main\Factories\Application\Controllers\Sell;

use Src\Application\Controllers\Sell\ShowSellController;
use Src\Main\Factories\Domain\Usecases\Sell\MakeSetupShowSell;
use Src\Main\Factories\Factory;

class MakeShowSellController extends Factory
{
  public static function make()
  {
    return new ShowSellController(MakeSetupShowSell::make());
  }
}
