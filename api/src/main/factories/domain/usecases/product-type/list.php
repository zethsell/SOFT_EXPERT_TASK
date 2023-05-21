<?php

namespace Src\Main\Factories\Domain\Usecases\ProductType;

use Src\Domain\Usecases\ProductType\ListProductTypes;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeProductTypeRepository;

class MakeSetupListProductTypes extends Factory
{
  public static function make()
  {
    return new ListProductTypes(MakeProductTypeRepository::make());
  }
}
