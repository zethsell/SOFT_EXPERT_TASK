<?php

namespace Src\Domain\Entities\User;

use Src\Domain\Contract\Repositories\User\IListUser;

interface IListUsers
{
  public function __construct(IListUser $repo);
  public function setupListUsers(): array;
}
