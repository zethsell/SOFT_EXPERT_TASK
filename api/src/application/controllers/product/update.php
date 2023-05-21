<?php

namespace Src\Application\Controllers\Product;

use Src\App\Application\Validation\ValidationBuilder as builder;
use Src\Application\Controllers\Controller;
use Src\Application\Helpers\HttpResponse;
use Src\Domain\Entities\Product\ISaveProduct;
use Src\Infra\Repositories\Postgres\Models\Product;
use Src\Infra\Repositories\Postgres\Models\ProductType;
use Throwable;

class UpdateProductController extends Controller
{
  public function __construct(private ISaveProduct $update)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->update->setupSaveProduct($request);
      return HttpResponse::ok($result);
    } catch (Throwable $error) {
      return HttpResponse::badRequest($error);
    }
  }

  protected function buildValidators($request): array
  {
    $values = sanitizeRequest($request, ['id', 'type_id']);
    return [
      ...builder::of(['value' => $values['id'], 'fieldName' => 'id'])->required()->exists(app(Product::class))->build(),
      ...builder::of([
        'value' => $values['type_id'],
        'fieldName' => 'type_id'
      ])->sometimes()->exists(app(ProductType::class))->build(),
    ];
  }
}
