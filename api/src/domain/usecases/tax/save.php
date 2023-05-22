<?php

namespace Src\Domain\Usecases\Tax;

use Src\Application\Errors\ContentNotFound;
use Src\Domain\Contract\Repositories\Tax\ISaveTax as ISave;
use Src\Domain\Entities\Tax\ISaveTax;
use Src\Infra\Repositories\Postgres\Models\Tax;

class SaveTax implements ISaveTax
{
  public function __construct(private ISave $repo)
  {
  }

  public function setupSaveTax($params): Tax
  {
    $tax =  $this->repo->save($params);
    if ($tax) {
      return $tax;
    }
    throw new ContentNotFound('tax');
  }
}
