<?php

namespace Src\Main\Factories\Application\Controllers\Product;

use Src\Application\Controllers\Product\InsertProductController;
use Src\Main\Factories\Domain\Usecases\Product\MakeSetupSaveProduct;
use Src\Main\Factories\Factory;

class MakeInsertProductController extends Factory
{
  public static function make()
  {
    return new InsertProductController(MakeSetupSaveProduct::make());
  }
}
