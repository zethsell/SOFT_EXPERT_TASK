<?php

namespace Src\Infra\Gateways;

use Src\Domain\Contract\Gateways\ITokenGenerator;
use Src\Domain\Contract\Gateways\ITokenValidator;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtHandler implements ITokenGenerator, ITokenValidator
{

  public function __construct(private string $secret)
  {
  }

  public  function generate(mixed $payload): string
  {
    return JWT::encode($payload, $this->secret, 'HS256');
  }

  public  function validate($token): mixed
  {
    return JWT::decode($token, new Key($this->secret, 'HS256'));
  }
}
