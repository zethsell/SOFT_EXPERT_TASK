<?php

use Src\Main\Adapters\AdaptRoute;
use Src\Main\Helpers\RouterResponse;

class Router
{

  public static function get(string $route, mixed $preBuilt)
  {
    self::handleResponse($route, 'GET', $preBuilt);
  }
  public static function post(string $route, mixed $preBuilt)
  {
    self::handleResponse($route, 'POST', $preBuilt);
  }
  public static function put(string $route, mixed $preBuilt)
  {
    self::handleResponse($route, 'PUT', $preBuilt);
  }
  public static function patch(string $route, mixed $preBuilt)
  {
    self::handleResponse($route, 'PATCH', $preBuilt);
  }
  public static function delete(string $route, mixed $preBuilt)
  {
    self::handleResponse($route, 'DELETE', $preBuilt);
  }

  // static function any(string $route, mixed $result)
  // {
  // }

  private static function handleResponse(string $route, string $method, mixed $preBuilt)
  {
    if (!self::matchRoute($route)) {
      return;
    }
    if (!self::matchMethod($method)) {
      RouterResponse::methodNotAllowed();
    }
    $result = AdaptRoute::handle($preBuilt);
    RouterResponse::success($result);
  }

  private static function matchRoute(string $route)
  {
    return ($_SERVER['REQUEST_URI'] === $route);
  }

  private static function matchMethod(string $method)
  {
    return ($_SERVER['REQUEST_METHOD'] === $method);
  }

  private static function route($route, $path_to_include)
  {
    $callback = $path_to_include;
    if (!is_callable($callback)) {
      if (!strpos($path_to_include, '.php')) {
        $path_to_include .= '.php';
      }
    }

    $request_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
    $request_url = rtrim($request_url, '/');
    $request_url = strtok($request_url, '?');
    $route_parts = explode('/', $route);
    $request_url_parts = explode('/', $request_url);
    array_shift($route_parts);
    array_shift($request_url_parts);
    if ($route_parts[0] == '' && count($request_url_parts) == 0) {
      // Callback function
      if (is_callable($callback)) {
        call_user_func_array($callback, []);
        exit();
      }
      include_once __DIR__ . "/$path_to_include";
      exit();
    }
    if (count($route_parts) != count($request_url_parts)) {
      return;
    }
    $parameters = [];
    for ($__i__ = 0; $__i__ < count($route_parts); $__i__++) {
      $route_part = $route_parts[$__i__];
      if (preg_match("/^[$]/", $route_part)) {
        $route_part = ltrim($route_part, '$');
        array_push($parameters, $request_url_parts[$__i__]);
        $$route_part = $request_url_parts[$__i__];
      } else if ($route_parts[$__i__] != $request_url_parts[$__i__]) {
        return;
      }
    }
    // Callback function
    if (is_callable($callback)) {
      call_user_func_array($callback, $parameters);
      exit();
    }
    include_once __DIR__ . "/$path_to_include";
    exit();
  }
}
