<?php

namespace Src\Domain\Usecases\Tax;

use Src\Application\Errors\ContentNotFound;
use Src\Domain\Contract\Repositories\Tax\IShowTax as IShow;
use Src\Domain\Entities\Tax\IShowTax;
use Src\Infra\Repositories\Postgres\Models\Tax;

class ShowTax implements IShowTax
{
  public function __construct(private IShow $repo)
  {
  }

  public function setupShowTax($params): Tax
  {
    $tax = $this->repo->show($params['id']);
    if ($tax) {
      return $tax;
    }
    throw new ContentNotFound('tax');
  }
}
