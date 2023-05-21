<?php

namespace Src\Main\Factories\Application\Controllers\Sell;

use Src\Application\Controllers\Sell\UpdateSellController;
use Src\Main\Factories\Domain\Usecases\Sell\MakeSetupSaveSell;
use Src\Main\Factories\Factory;

class MakeUpdateSellController extends Factory
{
  public static function make()
  {
    return new UpdateSellController(MakeSetupSaveSell::make());
  }
}
