<?php

namespace Src\Main\Factories\Application\Controllers\ProductType;

use Src\Application\Controllers\ProductType\UpdateProductTypeController;
use Src\Main\Factories\Domain\Usecases\ProductType\MakeSetupSaveProductType;
use Src\Main\Factories\Factory;

class MakeUpdateProductTypeController extends Factory
{
  public static function make()
  {
    return new UpdateProductTypeController(MakeSetupSaveProductType::make());
  }
}
