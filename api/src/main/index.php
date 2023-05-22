<?php

include_once '../../vendor/autoload.php';
include_once 'config/global.php';

try {
  import('@/main/config/env');
  import('@/main/config/settings');
  import('@/main/config/database');
  import('@/main/config/cors');
  import('@/main/config/router');
  import('@/main/config/routes');
} catch (Throwable $error) {
  http_response_code(500);
  echo json_encode($error);
}
