<?php

namespace Src\Main\Factories\Domain\Usecases\Product;

use Src\Domain\Usecases\Product\ShowProduct;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeProductRepository;

class MakeSetupShowProduct extends Factory
{
  public static function make()
  {
    return new ShowProduct(MakeProductRepository::make());
  }
}
