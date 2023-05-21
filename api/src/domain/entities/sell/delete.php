<?php

namespace Src\Domain\Entities\Sell;

use Src\Domain\Contract\Repositories\Sell\IDeleteSell as IDelete;

interface IDeleteSell
{
  public function __construct(IDelete $repo);
  public function setupDeleteSell($params): void;
}
