<?php

namespace Src\Main\Factories\Domain\Usecases\Tax;

use Src\Domain\Usecases\Tax\DeleteTax;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeTaxRepository;

class MakeSetupDeleteTax extends Factory
{
  public static function make()
  {
    return new DeleteTax(MakeTaxRepository::make());
  }
}
