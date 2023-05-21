<?php

namespace Src\Infra\Repositories\Postgres\Migrations;

use Illuminate\Database\Capsule\Manager as Database;

class CreateProductsSells
{
  public function up()
  {
    Database::schema()->create('products_sells', function ($table) {
      $table->increments('id');
      $table->bigInteger('product_id');
      $table->bigInteger('sell_id');
      $table->integer('value');
      $table->integer('quantity');
      $table->foreign('product_id')->references('id')->on('products');
      $table->foreign('sell_id')->references('id')->on('sells')->onDelete('CASCADE');
      $table->timestamp('updated_at')->nullable();
      $table->timestamps();
    });
  }

  public function down()
  {
    Database::schema()->delete('products_sells');
  }
}
