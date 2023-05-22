<?php

namespace Src\Main\Factories\Application\Controllers\Tax;

use Src\Application\Controllers\Tax\ShowTaxController;
use Src\Main\Factories\Domain\Usecases\Tax\MakeSetupShowTax;
use Src\Main\Factories\Factory;

class MakeShowTaxController extends Factory
{
  public static function make()
  {
    return new ShowTaxController(MakeSetupShowTax::make());
  }
}
