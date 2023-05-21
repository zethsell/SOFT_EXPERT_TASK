<?php

namespace Src\Domain\Usecases\Product;

use Src\Application\Errors\ContentNotFound;
use Src\Domain\Contract\Repositories\Product\ISaveProduct as ISave;
use Src\Domain\Entities\Product\ISaveProduct;
use Src\Infra\Repositories\Postgres\Models\Product;

class SaveProduct implements ISaveProduct
{
  public function __construct(private ISave $repo)
  {
  }

  public function setupSaveProduct($params): Product
  {
    $product =  $this->repo->save($params);
    if ($product) {
      return $product;
    }
    throw new ContentNotFound('product');
  }
}
