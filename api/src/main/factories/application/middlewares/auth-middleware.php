<?php

namespace Src\Main\Factories\Application\Middlewares;

use Src\Application\Middlewares\AuthenticationMiddleware;
use Src\Main\Factories\Factory;
use Src\Main\Factories\Infra\Gateways\MakeJwtHandler;

class MakeAuthenticationMiddleware extends Factory
{
  public static function make()
  {
    return new AuthenticationMiddleware(MakeJwtHandler::make());
  }
}
