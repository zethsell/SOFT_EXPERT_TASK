<?php

namespace Src\Main\Factories\Domain\Usecases\Sell;

use Src\Domain\Usecases\Sell\ListSells;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeSellRepository;

class MakeSetupListSells extends Factory
{
  public static function make()
  {
    return new ListSells(MakeSellRepository::make());
  }
}
