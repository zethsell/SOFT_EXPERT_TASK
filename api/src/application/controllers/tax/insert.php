<?php

namespace Src\Application\Controllers\Tax;

use Src\App\Application\Validation\ValidationBuilder as builder;
use Src\Application\Controllers\Controller;
use Src\Application\Helpers\HttpResponse;
use Src\Domain\Entities\Tax\ISaveTax;
use Throwable;

class InsertTaxController extends Controller
{
  public function __construct(private ISaveTax $save)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->save->setupSaveTax($request);
      return HttpResponse::created($result);
    } catch (Throwable $error) {
      return HttpResponse::badRequest($error);
    }
  }

  protected function buildValidators($request): array
  {
    $values = sanitizeRequest($request, ['description', 'value']);
    return [
      ...builder::of(['value' => $values['description'], 'fieldName' => 'description'])->required()->build(),
      ...builder::of(['value' => $values['value'], 'fieldName' => 'value'])->required()->build(),
    ];
  }
}
