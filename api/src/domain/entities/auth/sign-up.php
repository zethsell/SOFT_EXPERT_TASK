<?php

namespace Src\Domain\Entities\Auth;

interface ISignUp
{
  public function __construct(string $name, string $password, string $email);
  public function setupSignUp(): void;
}
