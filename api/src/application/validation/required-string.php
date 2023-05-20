<?php

namespace Src\App\Application\Validation;

use Src\Application\Errors\RequiredFieldError;

class RequiredString extends Required
{
  public function __construct(
    private $value,
    private $fieldName
  ) {
    parent::__construct($value, $fieldName);
  }

  public function validate()
  {
    $parentValidation = parent::validate();
    if (isset($parentValidation) || $this->value === '') {
      return new RequiredFieldError($this->fieldName);
    }
  }
}
