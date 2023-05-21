<?php

namespace Src\Main\Adapters;

class AdaptRoute
{
  public static function handle($preBuilt)
  {
    $controller = $preBuilt->make();
    return $controller->handle(request());
  }
}
