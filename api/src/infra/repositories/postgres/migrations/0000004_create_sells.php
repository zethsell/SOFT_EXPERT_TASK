<?php

namespace Src\Infra\Repositories\Postgres\Migrations;

use Illuminate\Database\Capsule\Manager as Database;

class CreateSells
{
  public function up()
  {
    Database::schema()->create('sells', function ($table) {
      $table->increments('id');
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down()
  {
    Database::schema()->delete('sells');
  }
}
