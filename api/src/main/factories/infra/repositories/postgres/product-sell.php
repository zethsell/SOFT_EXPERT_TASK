<?php

namespace Src\Main\Factories\Infra\Repositories\Postgres;

use Src\Main\Factories\Factory;
use Src\Infra\Repositories\Postgres\ProductSellRepository;

class MakeProductSellRepository extends Factory
{
  public static function make()
  {
    return new ProductSellRepository();
  }
}
