<?php

namespace Src\Infra\Gateways;

use Src\Domain\Contract\Gateways\ITokenHandler;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtTokenHandler implements ITokenHandler
{
  public function __construct(private string $secret)
  {
  }

  public static function generate(mixed $payload): string
  {
    return JWT::encode($payload, self::$secret, 'HS256');
  }

  public static function validate($token): mixed
  {
    return JWT::decode($token, new Key(self::$secret, 'HS256'));
  }
}
