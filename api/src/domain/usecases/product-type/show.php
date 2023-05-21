<?php

namespace Src\Domain\Usecases\ProductType;

use Src\Application\Errors\ContentNotFound;
use Src\Domain\Contract\Repositories\ProductType\IShowProductType as IShow;
use Src\Domain\Entities\ProductType\IShowProductType;
use Src\Infra\Repositories\Postgres\Models\ProductType;

class ShowProductType implements IShowProductType
{
  public function __construct(private IShow $repo)
  {
  }

  public function setupShowProductType($params): ProductType
  {
    $type = $this->repo->show($params['id']);
    if ($type) {
      return $type;
    }
    throw new ContentNotFound('product type');
  }
}
