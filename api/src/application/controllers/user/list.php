<?php

namespace Src\Application\Controllers\User;

use Src\Application\Controllers\Controller;
use Src\Application\Helpers\HttpResponse;
use Src\Domain\Entities\User\IListUsers;
use Throwable;

class ListUsersController extends Controller
{
  public function __construct(private IListUsers $list)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->list->setupListUsers();
      return HttpResponse::ok($result);
    } catch (Throwable $error) {
      return HttpResponse::badRequest($error);
    }
  }
}
