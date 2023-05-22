<?php

namespace Src\Infra\Repositories\Postgres\Migrations;

use Illuminate\Database\Capsule\Manager as Database;

class PopulateDB
{
  public function up()
  {
    Database::schema()->create('migrations', function ($table) {
      $table->increments('id');
      $table->string('migration');
    });

    Database::schema()->create('users', function ($table) {
      $table->increments('id');
      $table->string('name');
      $table->string('password');
      $table->string('email')->unique();
      $table->timestamps();
    });

    Database::schema()->create('product_types', function ($table) {
      $table->increments('id');
      $table->string('description');
      $table->timestamps();
      $table->softDeletes();
    });

    Database::schema()->create('products', function ($table) {
      $table->increments('id');
      $table->string('description');
      $table->decimal('value');
      $table->bigInteger('type_id');
      $table->foreign('type_id')->references('id')->on('product_types');
      $table->timestamps();
    });

    Database::schema()->create('sells', function ($table) {
      $table->increments('id');
      $table->timestamps();
      $table->softDeletes();
    });

    Database::schema()->create('products_sells', function ($table) {
      $table->increments('id');
      $table->bigInteger('product_id');
      $table->bigInteger('sell_id');
      $table->integer('value');
      $table->integer('quantity');
      $table->decimal('tax', 10, 2);
      $table->foreign('product_id')->references('id')->on('products');
      $table->foreign('sell_id')->references('id')->on('sells')->onDelete('CASCADE');
      $table->timestamps();
      $table->softDeletes();
    });

    Database::schema()->create('taxes', function ($table) {
      $table->increments('id');
      $table->string('description');
      $table->decimal('value', 10, 2);
      $table->timestamps();
      $table->softDeletes();
    });

    Database::schema()->create('product_type_taxes', function ($table) {
      $table->bigInteger('product_type_id');
      $table->bigInteger('tax_id');
      $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('CASCADE');
      $table->foreign('tax_id')->references('id')->on('taxes')->onDelete('CASCADE');
    });
  }

  public function down()
  {
    Database::schema()?->dropIfExists('product_type_taxes');
    Database::schema()?->dropIfExists('taxes');
    Database::schema()?->dropIfExists('products_sells');
    Database::schema()?->dropIfExists('sells');
    Database::schema()?->dropIfExists('products');
    Database::schema()?->dropIfExists('product_types');
    Database::schema()?->dropIfExists('users');
    Database::schema()?->dropIfExists('migrations');
  }
}
