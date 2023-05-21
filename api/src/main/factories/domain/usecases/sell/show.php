<?php

namespace Src\Main\Factories\Domain\Usecases\Sell;

use Src\Domain\Usecases\Sell\ShowSell;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeSellRepository;

class MakeSetupShowSell extends Factory
{
  public static function make()
  {
    return new ShowSell(MakeSellRepository::make());
  }
}
