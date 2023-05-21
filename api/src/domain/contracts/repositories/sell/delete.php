<?php

namespace Src\Domain\Contract\Repositories\Sell;

interface IDeleteSell
{
  public function delete(int $id): void;
}
