<?php

namespace Src\App\Application\Validation;

use Src\Application\Errors\PasswordConfirmationError;

class PasswordConfirmationValidator implements Validator
{
  public function __construct(
    private $password,
    private $passwordConfirmation
  ) {
  }

  public function validate()
  {
    if ($this->password !== $this->passwordConfirmation) {
      return new PasswordConfirmationError();
    }
  }
}
