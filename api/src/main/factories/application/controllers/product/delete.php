<?php

namespace Src\Main\Factories\Application\Controllers\Product;

use Src\Application\Controllers\Product\DeleteProductController;
use Src\Main\Factories\Domain\Usecases\Product\MakeSetupDeleteProduct;
use Src\Main\Factories\Factory;

class MakeDeleteProductController extends Factory
{
  public static function make()
  {
    return new DeleteProductController(MakeSetupDeleteProduct::make());
  }
}
