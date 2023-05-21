<?php

namespace Src\Main\Factories\Application\Controllers\Product;

use Src\Application\Controllers\Product\ListProductsController;
use Src\Main\Factories\Domain\Usecases\Product\MakeSetupListProducts;
use Src\Main\Factories\Factory;

class MakeListProductsController extends Factory
{
  public static function make()
  {
    return new ListProductsController(MakeSetupListProducts::make());
  }
}
