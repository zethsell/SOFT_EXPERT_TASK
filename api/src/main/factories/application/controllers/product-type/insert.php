<?php

namespace Src\Main\Factories\Application\Controllers\ProductType;

use Src\Application\Controllers\ProductType\InsertProductTypeController;
use Src\Main\Factories\Domain\Usecases\ProductType\MakeSetupSaveProductType;
use Src\Main\Factories\Factory;

class MakeInsertProductTypeController extends Factory
{
  public static function make()
  {
    return new InsertProductTypeController(MakeSetupSaveProductType::make());
  }
}
