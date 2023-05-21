<?php

namespace Src\Main\Factories\Domain\Usecases\Sell;

use Src\Domain\Usecases\Sell\DeleteSell;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Repositories\Postgres\MakeSellRepository;

class MakeSetupDeleteSell extends Factory
{
  public static function make()
  {
    return new DeleteSell(MakeSellRepository::make());
  }
}
