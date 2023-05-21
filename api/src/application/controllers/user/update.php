<?php

namespace Src\Application\Controllers\User;

use Src\App\Application\Validation\ValidationBuilder as builder;
use Src\Application\Controllers\Controller;
use Src\Application\Helpers\HttpResponse;
use Src\Domain\Entities\User\ISaveUser;
use Src\Infra\Repositories\Postgres\Models\User;
use Throwable;

class UpdateUserController extends Controller
{
  public function __construct(private ISaveUser $update)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->update->setupSaveUser($request);
      return HttpResponse::ok($result);
    } catch (Throwable $error) {
      return HttpResponse::badRequest($error);
    }
  }

  protected function buildValidators($request): array
  {
    $values = sanitizeRequest($request, ['email', 'id']);
    return [
      ...builder::of(['value' => $values['id'], 'fieldName' => 'id'])->required()->exists(app(User::class))->build(),
      ...builder::of([
        'value' => ['value' => $values['email'], 'id' => $values['id']],
        'fieldName' => 'email'
      ])->sometimes()->email()->unique(app(User::class))->build(),
    ];
  }
}
