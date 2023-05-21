<?php

namespace Src\Main\Factories\Domain\Usecases\ProductType;

use Src\Domain\Usecases\ProductType\ShowProductType;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeProductTypeRepository;

class MakeSetupShowProductType extends Factory
{
  public static function make()
  {
    return new ShowProductType(MakeProductTypeRepository::make());
  }
}
