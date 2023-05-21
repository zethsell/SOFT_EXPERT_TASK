<?php

namespace Src\Domain\Usecases\ProductType;

use Src\Domain\Contract\Repositories\ProductType\IDeleteProductType as IDelete;
use Src\Domain\Entities\ProductType\IDeleteProductType;

class DeleteProductType implements IDeleteProductType
{
  public function __construct(private IDelete $repo)
  {
  }

  public function setupDeleteProductType($params): void
  {
    $this->repo->delete($params['id']);
  }
}
