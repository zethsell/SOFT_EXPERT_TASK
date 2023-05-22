<?php

namespace Src\Domain\Entities\Tax;

use Src\Domain\Contract\Repositories\Tax\IShowTax as IShow;
use Src\Infra\Repositories\Postgres\Models\Tax;

interface IShowTax
{
  public function __construct(IShow $repo);
  public function setupShowTax($params): Tax;
}
