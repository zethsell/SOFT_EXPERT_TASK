<?php

namespace Src\Main\Routes;

use Router;
use Src\Application\Helpers\Response;
use Src\Infra\Repositories\Postgres\Migrations\PopulateDB;

Router::get('/migrate-up', function () {
  $create0 = new PopulateDB();
  $create0->up();
  echo  Response::json(['message' => 'all migrations was processed ']);
  exit();
});

Router::get('/migrate-down', function () {
  $create0 = new PopulateDB();
  $create0->down();
  echo  Response::json(['message' => 'all tables are dropped']);
  exit();
});
