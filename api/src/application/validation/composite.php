<?php

namespace Src\App\Application\Validation;

class ValidationComposite implements Validator
{
  public function __construct(
    private $validators
  ) {
  }

  public function validate()
  {
    foreach ($this->validators as $validator) {
      $error = $validator->validate();
      if (isset($error)) {
        return $error;
      }
    }
  }
}
