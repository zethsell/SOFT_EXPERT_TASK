<?php

namespace Src\Application\Controllers\Tax;

use Src\Application\Controllers\Controller;
use Src\Application\Helpers\HttpResponse;
use Src\Domain\Entities\Tax\IListTaxs;
use Throwable;

class ListTaxsController extends Controller
{
  public function __construct(private IListTaxs $list)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->list->setupListTaxs();
      return HttpResponse::ok($result);
    } catch (Throwable $error) {
      return HttpResponse::badRequest($error);
    }
  }
}
