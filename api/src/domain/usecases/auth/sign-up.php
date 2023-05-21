<?php

namespace Src\Domain\Usecases\Auth;

use Src\App\Application\Validation\ValidationBuilder as builder;
use Src\Domain\Contract\Gateways\IEncrypter;
use Src\Domain\Contract\Repositories\User\ISaveUser;
use Src\Domain\Entities\Auth\ISignUp;

class SignUp implements ISignUp
{
  public function __construct(private ISaveUser $repo, private IEncrypter $crypt)
  {
  }

  public function setupSignUp($params): void
  {
    $hashedPassword = $this->crypt->encrypt($params['password']);
    $this->repo->save([
      'password' => $hashedPassword,
      'name' => $params['name'],
      'email' => $params['email']
    ]);
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
