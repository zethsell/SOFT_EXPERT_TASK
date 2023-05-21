<?php

namespace Src\Application\Controllers\Sell;

use Src\App\Application\Validation\ValidationBuilder as builder;
use Src\Application\Controllers\Controller;
use Src\Application\Helpers\HttpResponse;
use Src\Domain\Entities\Sell\ISaveSell;
use Throwable;

class InsertSellController extends Controller
{
  public function __construct(private ISaveSell $save)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->save->setupSaveSell($request);
      return HttpResponse::created($result);
    } catch (Throwable $error) {
      return HttpResponse::badRequest($error);
    }
  }

  protected function buildValidators($request): array
  {
    $values = sanitizeRequest($request, ['details']);
    return [
      ...builder::of(['value' => $values['details'], 'fieldName' => 'details'])->required()->build(),
    ];
  }
}
