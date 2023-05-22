<?php

namespace Src\Domain\Contract\Repositories\Tax;

interface IDeleteTax
{
  public function delete(int $id): void;
}
