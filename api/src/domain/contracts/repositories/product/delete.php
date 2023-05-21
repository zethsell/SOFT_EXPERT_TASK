<?php

namespace Src\Domain\Contract\Repositories\Product;

interface IDeleteProduct
{
  public function delete(int $id): void;
}
