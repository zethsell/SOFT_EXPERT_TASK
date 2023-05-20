<?php

namespace Src\App\Application\Validation;

use Src\Application\Errors\RequiredFieldError;

class Required implements Validator
{
  public function __construct(
    private $value,
    private $fieldName
  ) {
  }

  public function validate()
  {
    if (is_null($this->value) || !isset($this->value)) {
      return new RequiredFieldError($this->fieldName);
    }
  }
}
