<?php

namespace Src\Domain\Entities\Tax;

use Src\Domain\Contract\Repositories\Tax\IDeleteTax as IDelete;

interface IDeleteTax
{
  public function __construct(IDelete $repo);
  public function setupDeleteTax($params): void;
}
