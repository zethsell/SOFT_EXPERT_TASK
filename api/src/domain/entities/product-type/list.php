<?php

namespace Src\Domain\Entities\ProductType;

use Src\Domain\Contract\Repositories\ProductType\IListProductType;

interface IListProductTypes
{
  public function __construct(IListProductType $repo);
  public function setupListProductTypes(): array;
}
