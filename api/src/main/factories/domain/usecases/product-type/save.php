<?php

namespace Src\Main\Factories\Domain\Usecases\ProductType;

use Src\Domain\Usecases\ProductType\SaveProductType;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeProductTypeRepository;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeTaxRepository;

class MakeSetupSaveProductType extends Factory
{
  public static function make()
  {
    return new SaveProductType(
      MakeProductTypeRepository::make(),
      MakeTaxRepository::make(),
    );
  }
}
