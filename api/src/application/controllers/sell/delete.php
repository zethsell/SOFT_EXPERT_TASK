<?php

namespace Src\Application\Controllers\Sell;

use Src\App\Application\Validation\ValidationBuilder as builder;
use Src\Application\Controllers\Controller;
use Src\Application\Helpers\HttpResponse;
use Src\Domain\Entities\Sell\IDeleteSell;
use Throwable;

class DeleteSellController extends Controller
{
  public function __construct(private IDeleteSell $delete)
  {
  }

  protected function perform($request)
  {
    try {
      $this->delete->setupDeleteSell($request);
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
