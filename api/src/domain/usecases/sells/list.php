<?php

namespace Src\Domain\Usecases\Sell;

use Src\Domain\Contract\Repositories\Sell\IListSell;
use Src\Domain\Entities\Sell\IListSells;


class ListSells implements IListSells
{
  public function __construct(private IListSell $repo)
  {
  }

  public function setupListSells(): array
  {
    return $this->repo->list();
  }
}
