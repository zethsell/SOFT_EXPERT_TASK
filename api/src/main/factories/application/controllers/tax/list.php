<?php

namespace Src\Main\Factories\Application\Controllers\Tax;

use Src\Application\Controllers\Tax\ListTaxsController;
use Src\Main\Factories\Domain\Usecases\Tax\MakeSetupListTaxs;
use Src\Main\Factories\Factory;

class MakeListTaxsController extends Factory
{
  public static function make()
  {
    return new ListTaxsController(MakeSetupListTaxs::make());
  }
}
