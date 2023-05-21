<?php

use Src\Main\Adapters\AdaptMiddleware;
use Src\Main\Adapters\AdaptRoute;
use Src\Main\Helpers\RouterResponse;

class Router
{
  const PREFIX = '/api';

  public static function get(string $route, mixed $preBuilt,  array $middlewares = [])
  {
    self::handleResponse($route, 'GET', $preBuilt, $middlewares);
  }
  public static function post(string $route, mixed $preBuilt,  array $middlewares = [])
  {
    self::handleResponse($route, 'POST', $preBuilt, $middlewares);
  }
  public static function put(string $route, mixed $preBuilt,  array $middlewares = [])
  {
    self::handleResponse($route, 'PUT', $preBuilt, $middlewares);
  }
  public static function patch(string $route, mixed $preBuilt,  array $middlewares = [])
  {
    self::handleResponse($route, 'PATCH', $preBuilt, $middlewares);
  }
  public static function delete(string $route, mixed $preBuilt,  array $middlewares = [])
  {
    self::handleResponse($route, 'DELETE', $preBuilt, $middlewares);
  }

  public static function error()
  {
    RouterResponse::notFound();
  }

  private static function handleResponse(string $route, string $method, mixed $preBuilt, array $middlewares)
  {
    $route = self::PREFIX . $route;
    if (!self::matchRoute($route)) {
      return;
    }
    if (!self::matchMethod($method)) {
      return;
    }

    AdaptMiddleware::handle($middlewares);

    if (is_callable($preBuilt)) {
      call_user_func_array($preBuilt, request());
      exit();
    }

    $params = self::parseParams($route);

    $result = AdaptRoute::handle($preBuilt, $params);
    RouterResponse::success($result);
  }

  private static function matchRoute(string $route)
  {
    $requesUrl = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
    $serverUrl =  explode('/', $requesUrl);
    array_shift($serverUrl);
    array_shift($serverUrl);
    $localUrl = explode('/', $route);
    array_shift($localUrl);
    array_shift($localUrl);
    return (current($localUrl) === current($serverUrl)) && (count($localUrl) === count($serverUrl));
  }

  private static function matchMethod(string $method)
  {
    return ($_SERVER['REQUEST_METHOD'] === $method);
  }

  private static function parseParams(string $route): array
  {
    $requestUrl = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
    $serverUrl =  explode('/', $requestUrl);
    $serverUrl = array_slice($serverUrl, 3);
    $localUrl = explode('/', $route);
    $localUrl = array_slice($localUrl, 3);
    $params = [];

    foreach ($serverUrl as $key => $value) {
      if (str_contains($localUrl[$key], ':')) {
        $localUrl = str_replace(':', '', $localUrl);
        $params[$localUrl[$key]] = $value;
      }
    }

    return $params;
  }
}

//   private static function route($route, $path_to_include)
//   {


//     $request_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
//     $request_url = rtrim($request_url, '/');
//     $request_url = strtok($request_url, '?');
//     $route_parts = explode('/', $route);
//     $request_url_parts = explode('/', $request_url);
//     array_shift($route_parts);
//     array_shift($request_url_parts);
//     if ($route_parts[0] == '' && count($request_url_parts) == 0) {
//       // Callback function
//       if (is_callable($callback)) {
//         call_user_func_array($callback, []);
//         exit();
//       }
//       include_once __DIR__ . "/$path_to_include";
//       exit();
//     }
//     if (count($route_parts) != count($request_url_parts)) {
//       return;
//     }
//     $parameters = [];
//     for ($__i__ = 0; $__i__ < count($route_parts); $__i__++) {
//       $route_part = $route_parts[$__i__];
//       if (preg_match("/^[$]/", $route_part)) {
//         $route_part = ltrim($route_part, '$');
//         array_push($parameters, $request_url_parts[$__i__]);
//         $$route_part = $request_url_parts[$__i__];
//       } else if ($route_parts[$__i__] != $request_url_parts[$__i__]) {
//         return;
//       }
//     }
//     // Callback function
//     if (is_callable($callback)) {
//       call_user_func_array($callback, $parameters);
//       exit();
//     }
//     include_once __DIR__ . "/$path_to_include";
//     exit();
//   }
// }
