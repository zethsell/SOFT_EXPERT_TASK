<?php

namespace Src\Application\Controllers;

use Error;
use Src\App\Application\Validation\ValidationComposite;
use Src\Application\Helpers\HttpResponse;
use Throwable;

abstract class Controller
{
  abstract protected function perform(mixed $request);

  protected function  buildValidators($request): array
  {
    return [];
  }

  public function handle($request)
  {
    $error =  $this->validate($request);
    if (isset($error)) {
      return HttpResponse::validationError($error);
    }
    try {
      return $this->perform($request);
    } catch (Throwable $error) {
      return HttpResponse::serverError($error);
    }
  }

  private function validate($request)
  {
    $validators = $this->buildValidators($request);
    $composite = new ValidationComposite($validators);
    return $composite->validate();
  }
}
