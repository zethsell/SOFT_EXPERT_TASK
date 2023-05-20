<?php

namespace Src\Application\Errors;

use Error;

class PasswordConfirmationError extends Error
{
  public function __construct()
  {
    $message = 'The password given does not match';
    parent::__construct($message, 422);
  }
}
