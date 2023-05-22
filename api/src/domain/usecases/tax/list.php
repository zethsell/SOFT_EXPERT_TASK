<?php

namespace Src\Domain\Usecases\Tax;

use Src\Domain\Contract\Repositories\Tax\IListTax;
use Src\Domain\Entities\Tax\IListTaxs;


class ListTaxs implements IListTaxs
{
  public function __construct(private IListTax $repo)
  {
  }

  public function setupListTaxs(): array
  {
    return $this->repo->list();
  }
}
