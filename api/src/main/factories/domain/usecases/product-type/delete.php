<?php

namespace Src\Main\Factories\Domain\Usecases\ProductType;

use Src\Domain\Usecases\ProductType\DeleteProductType;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeProductTypeRepository;

class MakeSetupDeleteProductType extends Factory
{
  public static function make()
  {
    return new DeleteProductType(MakeProductTypeRepository::make());
  }
}
