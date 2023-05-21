<?php

namespace Src\Main\Adapters;

class AdaptMiddleware
{
  public static function handle(array $middlewares)
  {
    foreach ($middlewares as $key) {
      $callable = app(MIDDLEWARES[$key]);
      $middleware = $callable->make();
      $result = $middleware->handle(request());
      if ($result) {
        exit();
      }
    }
  }
}
