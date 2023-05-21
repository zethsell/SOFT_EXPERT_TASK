<?php

namespace Src\Domain\Usecases\Sell;

use Src\Application\Errors\ContentNotFound;
use Src\Domain\Contract\Repositories\Sell\IShowSell as IShow;
use Src\Domain\Entities\Sell\IShowSell;
use Src\Infra\Repositories\Postgres\Models\Sell;

class ShowSell implements IShowSell
{
  public function __construct(private IShow $repo)
  {
  }

  public function setupShowSell($params): Sell
  {
    $sell = $this->repo->show($params['id']);
    if ($sell) {
      return $sell;
    }
    throw new ContentNotFound('Sell');
  }
}
