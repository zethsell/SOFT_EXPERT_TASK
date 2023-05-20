<?php

namespace Src\Application\Helpers;

class Response
{
  public static function json(mixed $data, $statusCode = 200)
  {
    http_response_code($statusCode);
    return  json_encode($data);
  }
}
