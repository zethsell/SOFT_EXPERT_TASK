<?php

namespace Src\Main\Factories\Application\Controllers\ProductType;

use Src\Application\Controllers\ProductType\DeleteProductTypeController;
use Src\Main\Factories\Domain\Usecases\ProductType\MakeSetupDeleteProductType;
use Src\Main\Factories\Factory;

class MakeDeleteProductTypeController extends Factory
{
  public static function make()
  {
    return new DeleteProductTypeController(MakeSetupDeleteProductType::make());
  }
}
