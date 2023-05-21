<?php

namespace Src\Infra\Repositories\Postgres\Migrations;

use Illuminate\Database\Capsule\Manager as Database;

class CreateProductTypes
{
  public function up()
  {
    Database::schema()->create('product_types', function ($table) {
      $table->increments('id');
      $table->string('description');
      $table->decimal('tax', 10, 2)->default(0);
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down()
  {
    Database::schema()->delete('product_types');
  }
}
