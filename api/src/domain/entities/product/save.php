<?php

namespace Src\Domain\Entities\Product;

use Src\Domain\Contract\Repositories\Product\ISaveProduct as ISave;
use Src\Infra\Repositories\Postgres\Models\Product;

interface ISaveProduct
{
  public function __construct(ISave $repo);
  public function setupSaveProduct(?array $params): Product;
}
