<?php

namespace Src\Main\Factories\Infra\Gateways;

use Src\Infra\Gateways\JwtHandler;
use Src\Main\Factories\Factory;

class MakeJwtHandler extends Factory
{
  public static function make()
  {
    return new JwtHandler(envVar('JWT_SECRET'));
  }
}
