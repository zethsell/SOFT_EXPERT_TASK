<?php

namespace Src\Application\Controllers\User;

use Src\App\Application\Validation\ValidationBuilder as builder;
use Src\Application\Controllers\Controller;
use Src\Application\Helpers\HttpResponse;
use Src\Domain\Entities\User\ISaveUser;
use Src\Infra\Repositories\Postgres\Models\User;
use Throwable;

class InsertUserController extends Controller
{
  public function __construct(private ISaveUser $save)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->save->setupSaveUser($request);
      return HttpResponse::created($result);
    } catch (Throwable $error) {
      return HttpResponse::badRequest($error);
    }
  }

  protected function buildValidators($request): array
  {
    $values = sanitizeRequest($request, ['email', 'password', 'name']);
    return [
      ...builder::of(['value' => $values['name'], 'fieldName' => 'name'])->required()->build(),
      ...builder::of(['value' => $values['password'], 'fieldName' => 'password'])->required()->build(),
      ...builder::of([
        'value' => $values['email'],
        'fieldName' => 'email'
      ])->required()->email()->unique(app(User::class))->build(),
    ];
  }
}
