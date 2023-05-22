<?php

namespace Src\Domain\Entities\ProductType;

use Src\Domain\Contract\Repositories\ProductType\ISaveProductType as ISave;
use Src\Domain\Contract\Repositories\Tax\ISaveTax;
use Src\Infra\Repositories\Postgres\Models\ProductType;

interface ISaveProductType
{
  public function __construct(ISave $repo, ISaveTax $repoTax);
  public function setupSaveProductType(?array $params): ProductType;
}
