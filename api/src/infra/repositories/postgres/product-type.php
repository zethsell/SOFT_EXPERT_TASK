<?php

namespace Src\Infra\Repositories\Postgres;

use Src\Domain\Contract\Repositories\ProductType\IDeleteProductType;
use Src\Domain\Contract\Repositories\ProductType\IListProductType;
use Src\Domain\Contract\Repositories\ProductType\ISaveProductType;
use Src\Domain\Contract\Repositories\ProductType\IShowProductType;
use Src\Infra\Repositories\Postgres\Models\ProductType;

class ProductTypeRepository implements IListProductType, IShowProductType, ISaveProductType, IDeleteProductType
{
  public function list(): array
  {
    return ProductType::with('taxes')
      ->orderBy('description', 'ASC')
      ->get()
      ->toArray();
  }

  public function show($id): ?ProductType
  {
    return ProductType::noTrash()->with('taxes')->whereId($id)->first();
  }

  public function save($data): ?ProductType
  {
    $productType = (!isset($data['id']))
      ? new ProductType
      : ProductType::whereId($data['id'])->first();
    $productType->fill($data)->save();
    return $productType;
  }

  public function delete($id): void
  {
    ProductType::softDelete($id);
  }
}
