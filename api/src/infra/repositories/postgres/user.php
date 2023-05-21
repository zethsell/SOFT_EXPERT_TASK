<?php

namespace Src\Infra\Repositories\Postgres;

use Src\Domain\Contract\Repositories\User\IDeleteUser;
use Src\Domain\Contract\Repositories\User\IListUser;
use Src\Domain\Contract\Repositories\User\ISaveUser;
use Src\Domain\Contract\Repositories\User\IShowUser;
use Src\Domain\Contract\Repositories\User\IShowUserByEmail;
use Src\Infra\Repositories\Postgres\Models\User;

class UserRpository implements IListUser, IShowUser, IShowUserByEmail, ISaveUser, IDeleteUser
{
  public function list(): array
  {
    return User::orderBy('name', 'ASC')->get();
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
    return (!isset($data['id']))
      ? User::create($data)
      : User::whereId($data['id'])->update($data);
  }

  public function delete($id): void
  {
    User::destroy($id);
  }
}
