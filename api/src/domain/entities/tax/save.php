<?php

namespace Src\Domain\Entities\Tax;

use Src\Domain\Contract\Repositories\Tax\ISaveTax as ISave;
use Src\Infra\Repositories\Postgres\Models\Tax;

interface ISaveTax
{
  public function __construct(ISave $repo);
  public function setupSaveTax(?array $params): Tax;
}
