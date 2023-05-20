<?php

namespace Src\Infra\Repositories\Postgres\Migrations;

use Illuminate\Database\Capsule\Manager as Database;

class CreateUsers
{
  public function up()
  {
    Database::schema()->create('users', function ($table) {
      $table->increments('id');
      $table->string('name');
      $table->string('email')->unique();
      $table->timestamps();
    });
  }

  public function down()
  {
    Database::schema()->delete('users');
  }
}
