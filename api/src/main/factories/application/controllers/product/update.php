<?php

namespace Src\Main\Factories\Application\Controllers\Product;

use Src\Application\Controllers\Product\UpdateProductController;
use Src\Main\Factories\Domain\Usecases\Product\MakeSetupSaveProduct;
use Src\Main\Factories\Factory;

class MakeUpdateProductController extends Factory
{
  public static function make()
  {
    return new UpdateProductController(MakeSetupSaveProduct::make());
  }
}
