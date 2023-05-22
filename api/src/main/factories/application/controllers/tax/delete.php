<?php

namespace Src\Main\Factories\Application\Controllers\Tax;

use Src\Application\Controllers\Tax\DeleteTaxController;
use Src\Main\Factories\Domain\Usecases\Tax\MakeSetupDeleteTax;
use Src\Main\Factories\Factory;

class MakeDeleteTaxController extends Factory
{
  public static function make()
  {
    return new DeleteTaxController(MakeSetupDeleteTax::make());
  }
}
