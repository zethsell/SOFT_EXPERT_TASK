<?php

namespace Src\Domain\Entities\Product;

use Src\Domain\Contract\Repositories\Product\IShowProduct as IShow;
use Src\Infra\Repositories\Postgres\Models\Product;

interface IShowProduct
{
  public function __construct(IShow $repo);
  public function setupShowProduct($params): Product;
}
