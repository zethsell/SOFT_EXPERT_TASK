<?php

namespace Src\Infra\Repositories\Postgres;

use Src\Domain\Contract\Repositories\Sell\IDeleteSell;
use Src\Domain\Contract\Repositories\Sell\IListSell;
use Src\Domain\Contract\Repositories\Sell\ISaveSell;
use Src\Domain\Contract\Repositories\Sell\IShowSell;
use Src\Infra\Repositories\Postgres\Models\Sell;

class SellRepository implements IListSell, IShowSell, ISaveSell, IDeleteSell
{
  public function list(): array
  {
    return Sell::noTrash()
      ->with('details', function ($details) {
        $details->with('product', function ($product) {
          $product->select(['id', 'description']);
        });
      })
      ->orderBy('created_at', 'DESC')
      ->get()
      ->toArray();
  }

  public function show($id): ?Sell
  {
    return Sell::noTrash()->whereId($id)->first();
  }

  public function save($data): ?Sell
  {
    $sell = (!isset($data['id']))
      ? new Sell
      : Sell::whereId($data['id'])->first();
    $sell->fill($data)->save();
    return $sell;
  }

  public function delete($id): void
  {
    Sell::softDelete($id);
  }
}
