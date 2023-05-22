<?php

namespace Src\Application\Controllers\Tax;

use Src\App\Application\Validation\ValidationBuilder as builder;
use Src\Application\Controllers\Controller;
use Src\Application\Helpers\HttpResponse;
use Src\Domain\Entities\Tax\ISaveTax;
use Src\Infra\Repositories\Postgres\Models\Tax;
use Throwable;

class UpdateTaxController extends Controller
{
  public function __construct(private ISaveTax $update)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->update->setupSaveTax($request);
      return HttpResponse::ok($result);
    } catch (Throwable $error) {
      return HttpResponse::badRequest($error);
    }
  }

  protected function buildValidators($request): array
  {
    $values = sanitizeRequest($request, ['id']);
    return [
      ...builder::of(['value' => $values['id'], 'fieldName' => 'id'])->required()->exists(app(Tax::class))->build(),
    ];
  }
}
