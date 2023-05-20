<?php

namespace Src\Infra\Repositories\Postgres\Migrations;

use Illuminate\Database\Capsule\Manager as Database;

class CreateProducts
{
  public function up()
  {
    Database::schema()->create('products', function ($table) {
      $table->increments('id');
      $table->string('description');
      $table->decimal('value');
      $table->bigInteger('type_id');
      $table->foreign('type_id')->references('id')->on('product_types');
      $table->timestamps();
    });
  }

  public function down()
  {
    Database::schema()->delete('products');
  }
}
