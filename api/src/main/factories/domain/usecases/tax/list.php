<?php

namespace Src\Main\Factories\Domain\Usecases\Tax;

use Src\Domain\Usecases\Tax\ListTaxs;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeTaxRepository;

class MakeSetupListTaxs extends Factory
{
  public static function make()
  {
    return new ListTaxs(MakeTaxRepository::make());
  }
}
