<?php

namespace Src\Main\Routes;

use Router;
use Src\Infra\Repositories\Postgres\Migrations\CreateMigrations;
use Src\Infra\Repositories\Postgres\Migrations\CreateProducts;
use Src\Infra\Repositories\Postgres\Migrations\CreateProductsSells;
use Src\Infra\Repositories\Postgres\Migrations\CreateProductTypes;
use Src\Infra\Repositories\Postgres\Migrations\CreateSells;
use Src\Infra\Repositories\Postgres\Migrations\CreateUsers;
use Src\Main\Adapters\AdaptRoute;
use Src\Main\Factories\Application\Controllers\Auth\MakeSignInController;


Router::get('/migrate-up', function () {
  $create0 = new CreateMigrations();
  $create0->up();
  $create1 = new CreateUsers();
  $create1->up();
  $create2 = new CreateProductTypes();
  $create2->up();
  $create3 = new CreateProducts();
  $create3->up();
  $create4 = new CreateSells();
  $create4->up();
  $create5 = new CreateProductsSells();
  $create5->up();
  return 'ok';
});

Router::get('/migrate-down', function () {
  $create1 = new CreateProductsSells();
  $create1->down();
  $create2 = new CreateSells();
  $create2->down();
  $create3 = new CreateProducts();
  $create3->down();
  $create4 = new CreateMigrations();
  $create4->down();
  $create5 = new CreateProductTypes();
  $create5->down();
  $create6 = new CreateUsers();
  $create6->down();
  return 'ok';
});
