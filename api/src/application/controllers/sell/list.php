<?php

namespace Src\Application\Controllers\Sell;

use Src\Application\Controllers\Controller;
use Src\Application\Helpers\HttpResponse;
use Src\Domain\Entities\Sell\IListSells;
use Throwable;

class ListSellsController extends Controller
{
  public function __construct(private IListSells $list)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->list->setupListSells();
      return HttpResponse::ok($result);
    } catch (Throwable $error) {
      return HttpResponse::badRequest($error);
    }
  }
}
