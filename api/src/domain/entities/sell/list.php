<?php

namespace Src\Domain\Entities\Sell;

use Src\Domain\Contract\Repositories\Sell\IListSell;

interface IListSells
{
  public function __construct(IListSell $repo);
  public function setupListSells(): array;
}
