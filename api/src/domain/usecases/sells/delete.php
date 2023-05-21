<?php

namespace Src\Domain\Usecases\Sell;

use Src\Domain\Contract\Repositories\Sell\IDeleteSell as IDelete;
use Src\Domain\Entities\Sell\IDeleteSell;

class DeleteSell implements IDeleteSell
{
  public function __construct(private IDelete $repo)
  {
  }

  public function setupDeleteSell($params): void
  {
    $this->repo->delete($params['id']);
  }
}
