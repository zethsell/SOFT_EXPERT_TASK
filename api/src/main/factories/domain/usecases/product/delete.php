<?php

namespace Src\Main\Factories\Domain\Usecases\Product;

use Src\Domain\Usecases\Product\DeleteProduct;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeProductRepository;

class MakeSetupDeleteProduct extends Factory
{
  public static function make()
  {
    return new DeleteProduct(MakeProductRepository::make());
  }
}
