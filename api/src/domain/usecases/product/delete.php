<?php

namespace Src\Domain\Usecases\Product;

use Src\Domain\Contract\Repositories\Product\IDeleteProduct as IDelete;
use Src\Domain\Entities\Product\IDeleteProduct;

class DeleteProduct implements IDeleteProduct
{
  public function __construct(private IDelete $repo)
  {
  }

  public function setupDeleteProduct($params): void
  {
    $this->repo->delete($params['id']);
  }
}
