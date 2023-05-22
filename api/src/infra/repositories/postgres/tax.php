<?php

namespace Src\Infra\Repositories\Postgres;

use Src\Domain\Contract\Repositories\Tax\IDeleteTax;
use Src\Domain\Contract\Repositories\Tax\IListTax;
use Src\Domain\Contract\Repositories\Tax\ISaveTax;
use Src\Domain\Contract\Repositories\Tax\IShowTax;
use Src\Infra\Repositories\Postgres\Models\Tax;

class TaxRepository implements IListTax, IShowTax, ISaveTax, IDeleteTax
{
  public function list(): array
  {
    return Tax::noTrash()
      ->orderBy('description', 'ASC')
      ->get()
      ->toArray();
  }

  public function show($id): ?Tax
  {
    return Tax::noTrash()->whereId($id)->first();
  }

  public function save($data): ?Tax
  {
    $productType = (!isset($data['id']))
      ? new Tax
      : Tax::whereId($data['id'])->first();
    $productType->fill($data)->save();
    return $productType;
  }

  public function delete($id): void
  {
    Tax::softDelete($id);
  }
}
