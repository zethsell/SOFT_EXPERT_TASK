<?php

namespace Src\Domain\Contract\Repositories\User;

interface IDeleteUser
{
  public function delete(int $id): void;
}
