<?php

namespace Src\Domain\Entities\Product;

use Src\Domain\Contract\Repositories\Product\IListProduct;

interface IListProducts
{
  public function __construct(IListProduct $repo);
  public function setupListProducts(): array;
}
