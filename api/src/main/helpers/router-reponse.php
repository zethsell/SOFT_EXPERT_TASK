<?php

namespace Src\Main\Helpers;

use Src\Application\Helpers\Response;

class RouterResponse
{
  public static function success($data)
  {
    echo $data;
    exit();
  }

  public static function methodNotAllowed()
  {
    echo Response::json(['error' => 'Method Not Allowed'],  405);
    exit();
  }
}
