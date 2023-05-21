<?php

namespace Src\Domain\Entities\ProductType;

use Src\Domain\Contract\Repositories\ProductType\ISaveProductType as ISave;
use Src\Infra\Repositories\Postgres\Models\ProductType;

interface ISaveProductType
{
  public function __construct(ISave $repo);
  public function setupSaveProductType(?array $params): ProductType;
}
