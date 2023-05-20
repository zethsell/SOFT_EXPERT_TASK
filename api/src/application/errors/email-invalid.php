<?php

namespace Src\Application\Errors;

use Error;

class EmailInvalidError extends Error
{
  public function __construct()
  {
    $message = 'The email given is not valid';
    parent::__construct($message, 422);
  }
}
