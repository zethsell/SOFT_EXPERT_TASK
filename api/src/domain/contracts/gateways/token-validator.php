<?php

namespace Src\Domain\Contract\Gateways;

interface ITokenValidator
{
  public function __construct(string $secret);
  public function validate(string $token): mixed;
}
