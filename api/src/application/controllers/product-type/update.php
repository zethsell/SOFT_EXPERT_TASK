<?php

namespace Src\Application\Controllers\ProductType;

use Src\App\Application\Validation\ValidationBuilder as builder;
use Src\Application\Controllers\Controller;
use Src\Application\Helpers\HttpResponse;
use Src\Domain\Entities\ProductType\ISaveProductType;
use Src\Infra\Repositories\Postgres\Models\ProductType;
use Throwable;

class UpdateProductTypeController extends Controller
{
  public function __construct(private ISaveProductType $update)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->update->setupSaveProductType($request);
      return HttpResponse::ok($result);
    } catch (Throwable $error) {
      return HttpResponse::badRequest($error);
    }
  }

  protected function buildValidators($request): array
  {
    $values = sanitizeRequest($request, ['id', 'description']);
    return [
      ...builder::of([
        'value' => $values['id'],
        'fieldName' => 'id'
      ])->required()->exists(app(ProductType::class))->build(),
      ...builder::of([
        'value' => ['value' => $values['description'], 'id' => $values['id']],
        'fieldName' => 'description'
      ])->sometimes()->unique(app(ProductType::class))->build()
    ];
  }
}
