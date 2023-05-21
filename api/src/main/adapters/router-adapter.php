<?php

namespace Src\Main\Adapters;

class AdaptRoute
{
  public static function handle($preBuilt, $params = [])
  {
    $controller = $preBuilt->make();
    return $controller->handle(array_merge(request(), $params));
  }
}
