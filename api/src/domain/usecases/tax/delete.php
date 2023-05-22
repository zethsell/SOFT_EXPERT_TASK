<?php

namespace Src\Domain\Usecases\Tax;

use Src\Domain\Contract\Repositories\Tax\IDeleteTax as IDelete;
use Src\Domain\Entities\Tax\IDeleteTax;

class DeleteTax implements IDeleteTax
{
  public function __construct(private IDelete $repo)
  {
  }

  public function setupDeleteTax($params): void
  {
    $this->repo->delete($params['id']);
  }
}
