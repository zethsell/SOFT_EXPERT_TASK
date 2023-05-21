<?php

namespace Src\Domain\Entities\ProductType;

use Src\Domain\Contract\Repositories\ProductType\IShowProductType as IShow;
use Src\Infra\Repositories\Postgres\Models\ProductType;

interface IShowProductType
{
  public function __construct(IShow $repo);
  public function setupShowProductType($params): ProductType;
}
