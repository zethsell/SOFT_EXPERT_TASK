<?php

namespace Src\Main\Config;

use Illuminate\Database\Capsule\Manager as Database;

$connection = new Database;
$connection->addConnection([
  "driver" => envVar('DB_CONNECTION', "postgresql"),
  "host" => envVar('DB_HOST', "127.0.0.1"),
  "port" => envVar('DB_PORT', "5432"),
  "database" => envVar('DB_DATABASE', "acl"),
  "username" => envVar('DB_USERNAME', "root"),
  "password" => envVar('DB_PASSWORD', "password")
]);
$connection->setAsGlobal();
$connection->bootEloquent();
