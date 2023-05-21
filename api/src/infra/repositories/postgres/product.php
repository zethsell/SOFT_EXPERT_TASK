<?php

namespace Src\Infra\Repositories\Postgres;

use Src\Domain\Contract\Repositories\Product\IDeleteProduct;
use Src\Domain\Contract\Repositories\Product\IListProduct;
use Src\Domain\Contract\Repositories\Product\ISaveProduct;
use Src\Domain\Contract\Repositories\Product\IShowProduct;
use Src\Infra\Repositories\Postgres\Models\Product;

class ProductRepository implements IListProduct, IShowProduct, ISaveProduct, IDeleteProduct
{
  public function list(): array
  {
    return Product::orderBy('description', 'ASC')
      ->with('productType')
      ->get()
      ->toArray();
  }

  public function show($id): ?Product
  {
    return Product::whereId($id)->first();
  }

  public function save($data): ?Product
  {
    $product = (!isset($data['id']))
      ? new Product
      : Product::whereId($data['id'])->first();
    $product->fill($data)->save();
    return $product;
  }

  public function delete($id): void
  {
    Product::destroy($id);
  }
}
