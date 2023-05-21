<?php

namespace Src\Domain\Entities\Product;

use Src\Domain\Contract\Repositories\Product\IDeleteProduct as IDelete;

interface IDeleteProduct
{
  public function __construct(IDelete $repo);
  public function setupDeleteProduct($params): void;
}
