<?php

namespace Src\Application\Controllers\Auth;

use Src\App\Application\Validation\ValidationBuilder as builder;
use Src\Application\Controllers\Controller;
use Src\Application\Helpers\HttpResponse;
use Src\Domain\Entities\Auth\ISignUp;
use Src\Infra\Repositories\Postgres\Models\User;
use Throwable;

class SignUpController extends Controller
{
  public function __construct(private ISignUp $signUp)
  {
  }

  protected function perform($request)
  {
    try {
      $this->signUp->setupSignUp($request);
      return HttpResponse::noContent();
    } catch (Throwable $error) {
      return HttpResponse::badRequest($error);
    }
  }

  protected function buildValidators($request): array
  {
    $values = sanitizeRequest($request, ['email', 'password', 'passwordConfirmation', 'name']);
    return [
      ...builder::of(['value' => $values['name'], 'fieldName' => 'name'])->required()->build(),
      ...builder::of(['value' => $values['password'], 'fieldName' => 'password'])->required()->password($values['passwordConfirmation'])->build(),
      ...builder::of(['value' => $values['email'], 'fieldName' => 'email'])->required()->email()->unique(app(User::class))->build(),
    ];
  }
}
