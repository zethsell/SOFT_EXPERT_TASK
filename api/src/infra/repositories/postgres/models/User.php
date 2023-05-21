<?php

namespace Src\Infra\Repositories\Postgres\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  protected $table = 'users';
  protected $fillable = ['id', 'name', 'email', 'password'];
}
