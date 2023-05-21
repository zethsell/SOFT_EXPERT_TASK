<?php

namespace Src\Application\Controllers\User;

use Src\Application\Controllers\Controller;
use Src\Application\Helpers\HttpResponse;
use Src\Domain\Entities\User\ILoggedUser;
use Throwable;

class LoggedUserController extends Controller
{
  public function __construct(private ILoggedUser $show)
  {
  }

  protected function perform($request)
  {
    try {
      $result = $this->show->setupLoggedUser();
      return HttpResponse::ok($result);
    } catch (Throwable $error) {
      return HttpResponse::badRequest($error);
    }
  }
}
