<?php

class Router
{
  static function get(string $route, mixed $result)
  {
    if (!self::matchRoute($route)) return;
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      echo $result;
      exit();
      self::route($route, $result);
    }
    http_response_code(405);
    echo json_encode(['error' => 'Not Found']);
  }
  static function post(string $route, mixed $result)
  {
    if (!self::matchRoute($route)) return;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      echo $result;
      exit();
    }
  }
  static function put(string $route, mixed $result)
  {
    if (!self::matchRoute($route)) return;
    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    }
  }
  static function patch(string $route, mixed $result)
  {
    if (!self::matchRoute($route)) return;
    if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
    }
  }
  static function delete(string $route, mixed $result)
  {
    if (!self::matchRoute($route)) return;
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    }
  }
  static function any(string $route, mixed $result)
  {
  }

  static private function matchRoute(string $route)
  {
    return ($_SERVER['REQUEST_URI'] === $route);
    // http_response_code(404);
    // echo json_encode(['error' => 'Not Found']);
    // exit();
  }

  static private function route($route, $path_to_include)
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
