<?php

namespace Src\Main\Adapters;

class AdaptRoute
{
  public static function handle($controller)
  {
    $_REQUEST = json_decode(file_get_contents("php://input"), true);
    $request = $_REQUEST;
    return $controller->handle($request);
  }
}
