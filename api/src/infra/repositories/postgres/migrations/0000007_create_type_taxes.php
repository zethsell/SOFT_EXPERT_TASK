<?php

namespace Src\Infra\Repositories\Postgres\Migrations;

use Illuminate\Database\Capsule\Manager as Database;

class CreateProductTypeTaxes
{
  public function up()
  {
    Database::schema()->create('product_type_taxes', function ($table) {
      $table->bigInteger('product_type_id');
      $table->bigInteger('tax_id');
      $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('CASCADE');
      $table->foreign('tax_id')->references('id')->on('taxes')->onDelete('CASCADE');
    });
  }

  public function down()
  {
    Database::schema()->drop('product_type_taxes');
  }
}
