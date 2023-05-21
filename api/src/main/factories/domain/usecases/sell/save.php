<?php

namespace Src\Main\Factories\Domain\Usecases\Sell;

use Src\Domain\Usecases\Sell\SaveSell;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeProductSellRepository;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeSellRepository;

class MakeSetupSaveSell extends Factory
{
  public static function make()
  {
    return new SaveSell(
      MakeSellRepository::make(),
      MakeProductSellRepository::make()
    );
  }
}
