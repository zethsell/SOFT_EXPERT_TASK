<?php

namespace Src\Domain\Usecases\ProductType;

use Src\Application\Errors\ContentNotFound;
use Src\Domain\Contract\Repositories\ProductType\ISaveProductType as ISave;
use Src\Domain\Entities\ProductType\ISaveProductType;
use Src\Infra\Repositories\Postgres\Models\ProductType;

class SaveProductType implements ISaveProductType
{
  public function __construct(private ISave $repo)
  {
  }

  public function setupSaveProductType($params): ProductType
  {
    $type = $this->repo->save($params);
    if ($type) {
      return $type;
    }
    throw new ContentNotFound('product type');
  }
}
