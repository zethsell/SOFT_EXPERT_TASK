<?php

namespace Src\Main\Factories\Application\Controllers\Sell;

use Src\Application\Controllers\Sell\DeleteSellController;
use Src\Main\Factories\Domain\Usecases\Sell\MakeSetupDeleteSell;
use Src\Main\Factories\Factory;

class MakeDeleteSellController extends Factory
{
  public static function make()
  {
    return new DeleteSellController(MakeSetupDeleteSell::make());
  }
}
