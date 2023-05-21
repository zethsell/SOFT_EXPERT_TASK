<?php

namespace Src\Application\Controllers\Product;

use Src\Application\Controllers\Controller;
use Src\Application\Helpers\HttpResponse;
use Src\Domain\Entities\Product\IListProducts;
use Throwable;

class ListProductsController extends Controller
{
  public function __construct(private IListProducts $list)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->list->setupListProducts();
      return HttpResponse::ok($result);
    } catch (Throwable $error) {
      return HttpResponse::badRequest($error);
    }
  }
}
