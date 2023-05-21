<?php

namespace Src\Application\Middlewares;

use Src\App\Application\Validation\RequiredString;
use Src\Application\Helpers\HttpResponse;
use Src\Domain\Contract\Gateways\ITokenValidator;
use Src\Main\Config\Auth;
use Throwable;

class AuthenticationMiddleware
{
  public function __construct(private ITokenValidator $authorize)
  {
  }

  public function handle($authParams)
  {
    if (!$this->validate($authParams['accessToken'])) {
      return HttpResponse::forbidden();
    }
    try {
      Auth::setSession($this->authorize->validate($authParams['accessToken']));
    } catch (Throwable $error) {
      return HttpResponse::forbidden($error);
    }
  }

  private function validate($authorization): bool
  {
    $validation = new RequiredString($authorization, 'authorization');
    $error = $validation->validate();
    return $error === null;
  }
}
