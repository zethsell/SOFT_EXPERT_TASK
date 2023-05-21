<?php

namespace Src\Domain\Entities\User;

use Src\Domain\Contract\Gateways\IEncrypter;
use Src\Domain\Contract\Repositories\User\ISaveUser as ISave;
use Src\Infra\Repositories\Postgres\Models\User;

interface ISaveUser
{
  public function __construct(ISave $repo, IEncrypter $crypt);
  public function setupSaveUser(?array $params): User;
}
