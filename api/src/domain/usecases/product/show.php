<?php

namespace Src\Domain\Usecases\Product;

use Src\Application\Errors\ContentNotFound;
use Src\Domain\Contract\Repositories\Product\IShowProduct as IShow;
use Src\Domain\Entities\Product\IShowProduct;
use Src\Infra\Repositories\Postgres\Models\Product;

class ShowProduct implements IShowProduct
{
  public function __construct(private IShow $repo)
  {
  }

  public function setupShowProduct($params): Product
  {
    $product = $this->repo->show($params['id']);
    if ($product) {
      return $product;
    }
    throw new ContentNotFound('product');
  }
}
