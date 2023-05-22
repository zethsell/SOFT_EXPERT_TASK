<?php

namespace Src\Application\Controllers\ProductType;

use Src\App\Application\Validation\ValidationBuilder as builder;
use Src\Application\Controllers\Controller;
use Src\Application\Helpers\HttpResponse;
use Src\Domain\Entities\ProductType\ISaveProductType;
use Src\Infra\Repositories\Postgres\Models\ProductType;
use Throwable;

class InsertProductTypeController extends Controller
{
  public function __construct(private ISaveProductType $save)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->save->setupSaveProductType($request);
      return HttpResponse::created($result);
    } catch (Throwable $error) {
      return HttpResponse::badRequest($error);
    }
  }

  protected function buildValidators($request): array
  {
    $values = sanitizeRequest($request, ['description']);
    return [
      ...builder::of([
        'value' => $values['description'],
        'fieldName' => 'description'
      ])->required()->unique(app(ProductType::class))->build(),
    ];
  }
}
