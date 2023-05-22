<?php

namespace Src\Main\Factories\Application\Controllers\Tax;

use Src\Application\Controllers\Tax\UpdateTaxController;
use Src\Main\Factories\Domain\Usecases\Tax\MakeSetupSaveTax;
use Src\Main\Factories\Factory;

class MakeUpdateTaxController extends Factory
{
  public static function make()
  {
    return new UpdateTaxController(MakeSetupSaveTax::make());
  }
}
