<?php

namespace Src\Domain\Contract\Gateways;

interface ITokenGenerator
{
  public function __construct(string $secret);
  public function generate(mixed $payload): string;
}
