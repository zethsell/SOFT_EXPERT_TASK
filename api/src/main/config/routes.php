<?php

$routes = scandir($_SERVER['DOCUMENT_ROOT'] . '/routes');

foreach ($routes as $route) {
  if (str_contains($route, '.php')) {
    import('@/main/routes/' . $route);
  }
}

Router::error();
