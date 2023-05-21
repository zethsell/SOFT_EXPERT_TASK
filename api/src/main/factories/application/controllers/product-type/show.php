<?php

namespace Src\Main\Factories\Application\Controllers\ProductType;

use Src\Application\Controllers\ProductType\ShowProductTypeController;
use Src\Main\Factories\Domain\Usecases\ProductType\MakeSetupShowProductType;
use Src\Main\Factories\Factory;

class MakeShowProductTypeController extends Factory
{
  public static function make()
  {
    return new ShowProductTypeController(MakeSetupShowProductType::make());
  }
}
