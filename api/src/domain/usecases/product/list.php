<?php

namespace Src\Domain\Usecases\Product;

use Src\Domain\Contract\Repositories\Product\IListProduct;
use Src\Domain\Entities\Product\IListProducts;


class ListProducts implements IListProducts
{
  public function __construct(private IListProduct $repo)
  {
  }

  public function setupListProducts(): array
  {
    return $this->repo->list();
  }
}
