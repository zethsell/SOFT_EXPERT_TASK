<?php

namespace Src\Application\Controllers\Product;

use Src\App\Application\Validation\ValidationBuilder as builder;
use Src\Application\Controllers\Controller;
use Src\Application\Helpers\HttpResponse;
use Src\Domain\Entities\Product\IShowProduct;
use Throwable;

class ShowProductController extends Controller
{
  public function __construct(private IShowProduct $show)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->show->setupShowProduct($request);
      return HttpResponse::ok($result);
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
