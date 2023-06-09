<?php

namespace Src\App\Application\Validation;

use Src\Application\Errors\ContentNotFound;
use Src\Application\Errors\FieldInvalidError;
use Src\Application\Errors\UniqueError;

class UniqueValidator implements Validator
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

    $param = (gettype($this->object) === 'array')
      ? (object)$this->object
      : $this->object;

    $result = $this->model
      ->where(function ($query) use ($param) {
        $query->where($this->fieldName, $param?->value ?? $param);

        if (isset($param->id)) {
          $query->where('id', '!=', intval($param->id));
        }
      })
      ->count();

    if ($result > 0) {
      return new UniqueError($this->fieldName, $param?->value ?? $param);
    }
  }
}
