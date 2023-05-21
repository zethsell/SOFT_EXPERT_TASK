<?php

namespace Src\Domain\Usecases\Sell;

use Src\Application\Errors\ContentNotFound;
use Src\Domain\Contract\Repositories\ProductSell\ISaveProductSell;
use Src\Domain\Contract\Repositories\Sell\ISaveSell as ISave;
use Src\Domain\Entities\Sell\ISaveSell;
use Src\Infra\Repositories\Postgres\Models\Sell;

class SaveSell implements ISaveSell
{
  public function __construct(private ISave $repo, private ISaveProductSell $psRepo)
  {
  }

  public function setupSaveSell($params): Sell
  {

    $sell =  $this->repo->save($params);
    if (!$sell) {
      throw new ContentNotFound('sell');
    }

    $tempDetails = $params['details'];

    foreach ($tempDetails as $key => $detail) {
      $tempDetails[$key]['sell_id'] = $sell->id;
    }

    $details = $this->psRepo->save($tempDetails);
    $sell['details'] = $details;
    return $sell;
  }
}
