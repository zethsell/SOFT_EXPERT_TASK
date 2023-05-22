<?php

namespace Src\Application\Controllers\Tax;

use Src\App\Application\Validation\ValidationBuilder as builder;
use Src\Application\Controllers\Controller;
use Src\Application\Helpers\HttpResponse;
use Src\Domain\Entities\Tax\IDeleteTax;
use Throwable;

class DeleteTaxController extends Controller
{
  public function __construct(private IDeleteTax $delete)
  {
  }

  protected function perform($request)
  {
    try {
      $this->delete->setupDeleteTax($request);
      return HttpResponse::noContent();
    } catch (Throwable $error) {
      return HttpResponse::badRequest($error);
    }
  }

  protected function buildValidators($request): array
  {
    $values = sanitizeRequest($request, ['id']);
    return [
      ...builder::of(['value' => $values['id'], 'fieldName' => 'id'])->required()->build()
    ];
  }
}
