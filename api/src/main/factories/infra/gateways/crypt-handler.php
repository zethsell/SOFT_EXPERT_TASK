<?php

namespace Src\Main\Factories\Infra\Gateways;

use Src\Infra\Gateways\CryptHandler;
use Src\Main\Factories\Factory;

class MakeCryptHandler extends Factory
{
  public static function make()
  {
    return new CryptHandler();
  }
}
