<?php

namespace Src\Application\Controllers\Auth;

use Src\App\Application\Validation\ValidationBuilder as builder;
use Src\Application\Controllers\Controller;
use Src\Application\Helpers\HttpResponse;
use Src\Domain\Entities\Auth\ISignIn;
use Throwable;

class SignInController extends Controller
{
  public function __construct(private ISignIn $signIn)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->signIn->setupSignIn($request);
      return HttpResponse::ok($result);
    } catch (Throwable $error) {
      return HttpResponse::badRequest($error);
    }
  }

  protected function buildValidators($request): array
  {
    $values = sanitizeRequest($request, ['email', 'password']);
    return [
      ...builder::of(['value' => $values['email'], 'fieldName' => 'email'])->required()->email()->build(),
      ...builder::of(['value' => $values['password'], 'fieldName' => 'password'])->required()->build()
    ];
  }
}
