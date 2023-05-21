<?php

namespace Src\Infra\Gateways;

use Src\Domain\Contract\Gateways\IEncrypter;

class CryptHandler implements IEncrypter
{
  public static function encrypt($value): string
  {
    return password_hash($value, PASSWORD_BCRYPT);
  }

  public static function compare($password, $hash): bool
  {
    return password_verify($password, $hash);
  }
}
