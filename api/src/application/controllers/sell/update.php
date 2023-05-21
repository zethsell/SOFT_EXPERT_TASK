<?php

namespace Src\Application\Controllers\Sell;

use Src\Application\Controllers\Controller;
use Src\Application\Helpers\HttpResponse;
use Src\Domain\Entities\Sell\ISaveSell;
use Throwable;

class UpdateSellController extends Controller
{
  public function __construct(private ISaveSell $update)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->update->setupSaveSell($request);
      return HttpResponse::ok($result);
    } catch (Throwable $error) {
      return HttpResponse::badRequest($error);
    }
  }
}
