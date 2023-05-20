<?php

namespace Src\Infra\Repostiories\Postgres\Models;

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('todos', function ($table) {
  $table->increments('id');
  $table->string('todo');
  $table->string('description');
  $table->string('category');
  $table->integer('user_id')->unsigned();
  $table->timestamps();
  $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
});
