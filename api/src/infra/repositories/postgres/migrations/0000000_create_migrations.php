<?php

namespace Src\Infra\Repositories\Postgres\Migrations;

use Illuminate\Database\Capsule\Manager as Database;

class CreateMigrations
{
  public function up()
  {
    Database::schema()->create('migrations', function ($table) {
      $table->increments('id');
      $table->string('migration');
    });
  }

  public function down()
  {
    Database::schema()->delete('migrations');
  }
}


$class = new CreateMigrations();
$class->up();
