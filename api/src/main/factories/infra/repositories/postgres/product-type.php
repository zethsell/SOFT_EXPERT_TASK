<?php

namespace Src\Main\Factories\Infra\Repositories\Postgres;

use Src\Main\Factories\Factory;
use Src\Infra\Repositories\Postgres\ProductTypeRepository;

class MakeProductTypeRepository extends Factory
{
  public static function make()
  {
    return new ProductTypeRepository();
  }
}
