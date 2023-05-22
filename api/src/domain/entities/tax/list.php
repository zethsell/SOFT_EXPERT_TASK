<?php

namespace Src\Domain\Entities\Tax;

use Src\Domain\Contract\Repositories\Tax\IListTax;

interface IListTaxs
{
  public function __construct(IListTax $repo);
  public function setupListTaxs(): array;
}
