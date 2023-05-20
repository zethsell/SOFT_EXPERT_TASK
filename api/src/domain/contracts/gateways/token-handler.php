<?php

namespace Src\Domain\Contract\Gateways;

interface ITokenHandler
{
  public function __construct(string $secret);
  public static function generate(mixed $payload): string;
  public static function validate(string $token): mixed;
}
