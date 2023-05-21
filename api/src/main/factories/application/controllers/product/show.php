<?php

namespace Src\Main\Factories\Application\Controllers\Product;

use Src\Application\Controllers\Product\ShowProductController;
use Src\Main\Factories\Domain\Usecases\Product\MakeSetupShowProduct;
use Src\Main\Factories\Factory;

class MakeShowProductController extends Factory
{
  public static function make()
  {
    return new ShowProductController(MakeSetupShowProduct::make());
  }
}
