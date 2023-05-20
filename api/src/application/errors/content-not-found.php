<?php

namespace Src\Application\Errors;

use Error;

class ContentNotFound extends Error
{
  public function __construct(?string $fieldName)
  {
    $message = !isset($fieldName)
      ? 'Content not found'
      : `Not found any $fieldName`;

    parent::__construct($message, 404);
  }
}
