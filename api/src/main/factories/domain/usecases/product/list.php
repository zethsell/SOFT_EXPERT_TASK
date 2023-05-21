<?php

namespace Src\Main\Factories\Domain\Usecases\Product;

use Src\Domain\Usecases\Product\ListProducts;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeProductRepository;

class MakeSetupListProducts extends Factory
{
  public static function make()
  {
    return new ListProducts(MakeProductRepository::make());
  }
}
