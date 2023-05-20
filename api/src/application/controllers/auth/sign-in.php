<?php

namespace Src\Application\Controllers\Auth;

use Exception;
use Src\App\Application\Validation\ValidationBuilder;
use Src\Application\Controllers\Controller;
use Src\Application\Helpers\HttpResponse;
use Src\Domain\Entities\Auth\ISignIn;

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
    } catch (Exception $error) {
      return HttpResponse::badRequest($error);
    }
  }

  protected function buildValidators($request): array
  {
    $request['email'] ?? $request['email'] = null;
    $request['password'] ?? $request['password'] = null;
    return [
      ...ValidationBuilder::of([
        'value' => $request['email'],
        'fieldName' => 'email'
      ])->required()->email()->build(),
      ...ValidationBuilder::of([
        'value' => $request['password'],
        'fieldName' => 'password'
      ])->required()->build()
    ];
  }
}
