<?php

namespace Src\Main\Routes;

use Router;
use Src\Application\Helpers\Response;
use Src\Infra\Repositories\Postgres\Migrations\CreateMigrations;
use Src\Infra\Repositories\Postgres\Migrations\CreateProducts;
use Src\Infra\Repositories\Postgres\Migrations\CreateProductsSells;
use Src\Infra\Repositories\Postgres\Migrations\CreateProductTypes;
use Src\Infra\Repositories\Postgres\Migrations\CreateSells;
use Src\Infra\Repositories\Postgres\Migrations\CreateUsers;
use Src\Infra\Repositories\Postgres\Migrations\CreateTaxes;
use Src\Infra\Repositories\Postgres\Migrations\CreateProductTypeTaxes;
use Src\Infra\Repositories\Postgres\Migrations\PopulateDB;

Router::get('/migrate-up', function () {
  $create0 = new PopulateDB();
  $create0->up();
  // $create1 = new CreateUsers();
  // $create1->up();
  // $create2 = new CreateProductTypes();
  // $create2->up();
  // $create3 = new CreateProducts();
  // $create3->up();
  // $create4 = new CreateSells();
  // $create4->up();
  // $create5 = new CreateProductsSells();
  // $create5->up();
  // $create6 = new CreateTaxes();
  // $create6->up();
  // $create7 = new CreateProductTypeTaxes();
  // $create7->up();
  echo  Response::json(['message' => 'all migrations was processed ']);
  exit();
});

Router::get('/migrate-down', function () {
  $create0 = new PopulateDB();
  $create0->down();
  echo  Response::json(['message' => 'all tables are dropped']);
  exit();
});
