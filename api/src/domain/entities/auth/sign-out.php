<?php

namespace Src\Domain\Entities\Auth;

interface ISignOut
{
  public function __construct(string $id);
  public function setupSignOut(): void;
}
