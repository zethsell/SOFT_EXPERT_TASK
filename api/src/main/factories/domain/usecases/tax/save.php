<?php

namespace Src\Main\Factories\Domain\Usecases\Tax;

use Src\Domain\Usecases\Tax\SaveTax;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeTaxRepository;

class MakeSetupSaveTax extends Factory
{
  public static function make()
  {
    return new SaveTax(
      MakeTaxRepository::make()
    );
  }
}
