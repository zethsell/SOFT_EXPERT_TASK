<?php

namespace Src\Domain\Contract\Repositories\ProductType;

interface IDeleteProductType
{
  public function delete(int $id): void;
}
