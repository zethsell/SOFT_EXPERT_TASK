<?php

namespace Src\App\Application\Validation;

class ValidationBuilder
{
  private $value;
  private $validators;
  private $fieldName;

  public function __construct($params)
  {
    $this->value = $params['value'];
    $this->validators = $params['validator'] ?? [];
    $this->fieldName = $params['fieldName'];
  }

  public static function of($params)
  {
    return new ValidationBuilder($params);
  }

  public function   required()
  {
    $error = null;
    if (gettype($this->value) === 'string') {
      $error = new RequiredString($this->value, $this->fieldName);
    } elseif (gettype($this->value) === 'number') {
      $error = new RequiredString(strval($this->value), $this->fieldName);
    } elseif (gettype($this->value) === 'object') {
      $error = new Required($this->value, $this->fieldName);
    } elseif (!isset($this->value)) {
      $error = new RequiredString($this->value, $this->fieldName);
    }

    if (!is_null($error)) {
      array_push($this->validators, $error);
    }
    return $this;
  }


  public function sometimes()
  {
    if (isset($this->value)) {
      $this->required();
    }
    return $this;
  }

  public function exists($model)
  {
    if (isset($this->value)) {
      array_push($this->validators, new ExistConfirmationValidator($model, $this->value, $this->fieldName));
    }
    return $this;
  }

  public function password($confirmation = null)
  {
    if (isset($this->value)) {
      array_push($this->validators, new PasswordConfirmationValidator($this->value, $confirmation));
    }
    return $this;
  }

  public function email(): ValidationBuilder
  {
    if (isset($this->value)) {
      array_push($this->validators, new EmailConfirmationValidator($this->value));
    }
    return $this;
  }

  public function unique($model)
  {
    if (isset($this->value) && isset($this->fieldName)) {
      array_push($this->validators, new UniqueValidator($model, $this->value, $this->fieldName));
    }
    return $this;
  }

  public function build()
  {
    return $this->validators;
  }
}
