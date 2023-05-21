<?php

namespace Src\Domain\Entities\Sell;

use Src\Domain\Contract\Repositories\Sell\IShowSell as IShow;
use Src\Infra\Repositories\Postgres\Models\Sell;

interface IShowSell
{
  public function __construct(IShow $repo);
  public function setupShowSell($params): Sell;
}
