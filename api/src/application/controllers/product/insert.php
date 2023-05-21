<?php

namespace Src\Application\Controllers\Product;

use Src\App\Application\Validation\ValidationBuilder as builder;
use Src\Application\Controllers\Controller;
use Src\Application\Helpers\HttpResponse;
use Src\Domain\Entities\Product\ISaveProduct;
use Src\Infra\Repositories\Postgres\Models\ProductType;
use Throwable;

class InsertProductController extends Controller
{
  public function __construct(private ISaveProduct $save)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->save->setupSaveProduct($request);
      return HttpResponse::created($result);
    } catch (Throwable $error) {
      return HttpResponse::badRequest($error);
    }
  }

  protected function buildValidators($request): array
  {
    $values = sanitizeRequest($request, ['description', 'value', 'type_id']);
    return [
      ...builder::of(['value' => $values['description'], 'fieldName' => 'description'])->required()->build(),
      ...builder::of(['value' => $values['value'], 'fieldName' => 'value'])->required()->build(),
      ...builder::of([
        'value' => $values['type_id'],
        'fieldName' => 'type_id'
      ])->required()->exists(app(ProductType::class))->build(),
    ];
  }
}
