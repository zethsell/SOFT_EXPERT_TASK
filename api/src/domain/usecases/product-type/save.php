<?php

namespace Src\Domain\Usecases\ProductType;

use Src\Application\Errors\ContentNotFound;
use Src\Domain\Contract\Repositories\ProductType\ISaveProductType as ISave;
use Src\Domain\Contract\Repositories\Tax\ISaveTax;
use Src\Domain\Entities\ProductType\ISaveProductType;
use Src\Infra\Repositories\Postgres\Models\ProductType;

class SaveProductType implements ISaveProductType
{
  public function __construct(private ISave $repo, private ISaveTax $repoTax)
  {
  }

  public function setupSaveProductType($params): ProductType
  {
    $type = $this->repo->save($params);
    if (!$type) {
      throw new ContentNotFound('product type');
    }

    $taxes = $params['taxes'];

    if (!empty($taxes)) {
      foreach ($taxes as $key => $tax) {
        $taxes[$key]['product_type_id'] = $type->id;
      }
      $type->taxes()->sync($taxes);
    }
    return $type;
  }
}
