<?php

namespace Src\Main\Factories\Application\Controllers\ProductType;

use Src\Application\Controllers\ProductType\ListProductTypesController;
use Src\Main\Factories\Domain\Usecases\ProductType\MakeSetupListProductTypes;
use Src\Main\Factories\Factory;

class MakeListProductTypesController extends Factory
{
  public static function make()
  {
    return new ListProductTypesController(MakeSetupListProductTypes::make());
  }
}
