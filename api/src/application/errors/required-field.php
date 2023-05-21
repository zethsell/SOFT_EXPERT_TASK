<?php

namespace Src\Application\Errors;

use Error;

class RequiredFieldError extends Error
{
  public function __construct(string $fieldName = null)
  {
    $message = !isset($fieldName)
      ? 'Field required'
      : "The field $fieldName is required!";

    parent::__construct($message, 412);
  }
}
