<?php

namespace Src\Application\Controllers\User;

use Src\App\Application\Validation\ValidationBuilder as builder;
use Src\Application\Controllers\Controller;
use Src\Application\Helpers\HttpResponse;
use Src\Domain\Entities\User\IShowUser;
use Throwable;

class ShowUserController extends Controller
{
  public function __construct(private IShowUser $show)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->show->setupShowUser($request);
      return HttpResponse::ok($result);
    } catch (Throwable $error) {
      return HttpResponse::badRequest($error);
    }
  }

  protected function buildValidators($request): array
  {
    $values = sanitizeRequest($request, ['id']);
    return [
      ...builder::of(['value' => $values['id'], 'fieldName' => 'id'])->required()->build()
    ];
  }
}
