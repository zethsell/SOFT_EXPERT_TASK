<?php

namespace Src\Domain\Errors;

use Error;

class AuthenticationError extends Error
{
  public function __construct()
  {
    $message = 'Authentication Fails';
    parent::__construct($message, 401);
  }
}
