<?php

function import(string $path): void
{
  $arrayPath = explode('@', $path);
  $realPath = str_replace('/main', '', $_SERVER['DOCUMENT_ROOT']);
  $realPath .= str_contains(end($arrayPath), '.php')
    ? end($arrayPath)
    : end($arrayPath) . '.php';
  include_once($realPath);
}

function mountError($error = null): array | null | string
{
  if (gettype($error) === 'string') return $error;
  if (!$error?->getMessage()) return null;
  return [
    'message' => $error->getMessage(),
    'file' => $error->getFile(),
    'line' => $error->getLine(),
  ];
}
