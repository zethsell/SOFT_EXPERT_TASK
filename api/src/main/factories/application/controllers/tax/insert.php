<?php

namespace Src\Main\Factories\Application\Controllers\Tax;

use Src\Application\Controllers\Tax\InsertTaxController;
use Src\Main\Factories\Domain\Usecases\Tax\MakeSetupSaveTax;
use Src\Main\Factories\Factory;

class MakeInsertTaxController extends Factory
{
  public static function make()
  {
    return new InsertTaxController(MakeSetupSaveTax::make());
  }
}
