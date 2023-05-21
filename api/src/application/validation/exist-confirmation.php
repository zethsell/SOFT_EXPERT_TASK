<?php

namespace Src\App\Application\Validation;

use Src\Application\Errors\ContentNotFound;
use Src\Application\Errors\FieldInvalidError;

class ExistConfirmationValidator implements Validator
{
  public function __construct(
    private $model,
    private mixed $object,
    private ?string $fieldName
  ) {
  }

  public function validate()
  {
    if (
      $this->model === ''
      || !isset($this->model)
      || is_null($this->model)
      || !isset($this->object)
      || is_null($this->object)
    ) {
      return new FieldInvalidError();
    }

    $param = (gettype($this->object) === 'object')
      ? $this->object->id
      : $this->object;

    if (gettype($param) === 'string') {
      $param = intval($param);
    }

    $find = $this->model->whereId($param)->first();

    if (!$find) {
      return new ContentNotFound();
    }
  }
}
