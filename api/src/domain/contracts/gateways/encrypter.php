<?php

namespace Src\Domain\Contract\Gateways;

interface IEncrypter
{
  public static function encrypt(string $password): string;
  public static function compare(string $password, string $hash): bool;
}
