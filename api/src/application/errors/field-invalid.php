<?php

namespace Src\Application\Errors;

use Error;

class FieldInvalidError extends Error
{
  public function __construct()
  {
    $message = 'The value given is not valid';
    parent::__construct($message, 412);
  }
}
