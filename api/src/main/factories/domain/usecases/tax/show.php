<?php

namespace Src\Main\Factories\Domain\Usecases\Tax;

use Src\Domain\Usecases\Tax\ShowTax;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeTaxRepository;

class MakeSetupShowTax extends Factory
{
  public static function make()
  {
    return new ShowTax(MakeTaxRepository::make());
  }
}
