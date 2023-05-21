<?php

namespace Src\Domain\Usecases\ProductType;

use Src\Domain\Contract\Repositories\ProductType\IListProductType;
use Src\Domain\Entities\ProductType\IListProductTypes;


class ListProductTypes implements IListProductTypes
{
  public function __construct(private IListProductType $repo)
  {
  }

  public function setupListProductTypes(): array
  {
    return $this->repo->list();
  }
}
