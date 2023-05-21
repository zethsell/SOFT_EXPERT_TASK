<?php

namespace Src\Domain\Entities\Sell;

use Src\Domain\Contract\Repositories\ProductSell\ISaveProductSell;
use Src\Domain\Contract\Repositories\Sell\ISaveSell as ISave;
use Src\Infra\Repositories\Postgres\Models\Sell;

interface ISaveSell
{
  public function __construct(ISave $repo, ISaveProductSell $psRepo);
  public function setupSaveSell(?array $params): Sell;
}
