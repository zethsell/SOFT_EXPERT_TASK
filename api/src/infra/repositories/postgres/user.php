<?php

namespace Src\Infra\Repositories\Postgres;

use Src\Domain\Contract\Repositories\User\IDeleteUser;
use Src\Domain\Contract\Repositories\User\IListUser;
use Src\Domain\Contract\Repositories\User\ISaveUser;
use Src\Domain\Contract\Repositories\User\IShowUser;
use Src\Domain\Contract\Repositories\User\IShowUserByEmail;
use Src\Infra\Repositories\Postgres\Models\User;

class UserRepository implements IListUser, IShowUser, IShowUserByEmail, ISaveUser, IDeleteUser
{
  public function list(): array
  {
    return User::orderBy('name', 'ASC')
      ->get(['id', 'name', 'email', 'created_at', 'updated_at'])
      ->toArray();
  }

  public function show($id): ?User
  {
    return User::whereId($id)->first();
  }

  public function showByEmail($email): ?User
  {
    return User::whereEmail($email)->first();
  }

  public function save($data): ?User
  {
    $user = (!isset($data['id'])) ? new User : User::whereId($data['id'])->first();
    $user->fill($data)->save();
    unset($user['password']);
    return $user;
  }

  public function delete($id): void
  {
    User::destroy($id);
  }
}
