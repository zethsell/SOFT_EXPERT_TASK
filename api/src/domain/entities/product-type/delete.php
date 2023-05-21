<?php

namespace Src\Domain\Entities\ProductType;

use Src\Domain\Contract\Repositories\ProductType\IDeleteProductType as IDelete;

interface IDeleteProductType
{
  public function __construct(IDelete $repo);
  public function setupDeleteProductType($params): void;
}
