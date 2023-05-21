<?php

namespace Src\Application\Controllers\ProductType;

use Src\Application\Controllers\Controller;
use Src\Application\Helpers\HttpResponse;
use Src\Domain\Entities\ProductType\IListProductTypes;
use Throwable;

class ListProductTypesController extends Controller
{
  public function __construct(private IListProductTypes $list)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->list->setupListProductTypes();
      return HttpResponse::ok($result);
    } catch (Throwable $error) {
      return HttpResponse::badRequest($error);
    }
  }
}
