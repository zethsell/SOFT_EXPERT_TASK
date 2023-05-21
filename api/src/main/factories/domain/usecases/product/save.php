<?php

namespace Src\Main\Factories\Domain\Usecases\Product;

use Src\Domain\Usecases\Product\SaveProduct;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeProductRepository;

class MakeSetupSaveProduct extends Factory
{
  public static function make()
  {
    return new SaveProduct(
      MakeProductRepository::make()
    );
  }
}
