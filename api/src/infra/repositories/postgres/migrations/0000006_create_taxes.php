<?php

namespace Src\Infra\Repositories\Postgres\Migrations;

use Illuminate\Database\Capsule\Manager as Database;

class CreateTaxes
{
  public function up()
  {
    Database::schema()->create('taxes', function ($table) {
      $table->increments('id');
      $table->string('description');
      $table->decimal('value', 10, 2);
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down()
  {
    Database::schema()->drop('taxes');
  }
}
