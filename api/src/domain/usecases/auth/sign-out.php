<?php

namespace Src\Domain\Usecases\Auth;

use Src\Domain\Entities\Auth\ISignOut;

class SignOut implements ISignOut
{

  public function __construct(private string $id)
  {
  }

  public function setupSignOut(): void
  {
  }
}
