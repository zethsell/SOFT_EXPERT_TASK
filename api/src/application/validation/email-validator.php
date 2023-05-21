<?php

namespace Src\App\Application\Validation;

use Src\Application\Errors\EmailInvalidError;

class EmailConfirmationValidator implements Validator
{
  public function __construct(
    private $email
  ) {
  }

  public function validate()
  {
    if (is_null($this->email) || !isset($this->email)) {
      return new EmailInvalidError();
    }
    $emailVerify = (gettype($this->email)  === 'array')
      ? $this->email['value']
      : $this->email;

    $isValid = $this->emailValidator($emailVerify);
    if (!$isValid) {
      return new EmailInvalidError();
    }
  }

  private function emailValidator(string $email): bool
  {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
  }
}
