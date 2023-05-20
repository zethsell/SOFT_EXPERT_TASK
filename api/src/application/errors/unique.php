<?php

namespace Src\Application\Errors;

use Error;

class UniqueError extends Error
{
  public function __construct(string $fieldName, string | int $value)
  {
    $message = "$fieldName must be unique and the value $value already exists";
    parent::__construct($message, 409);
  }
}
