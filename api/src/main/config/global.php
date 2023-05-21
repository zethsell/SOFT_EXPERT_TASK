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
  if (gettype($error) === 'string') {
    return $error;
  }
  if (!$error?->getMessage()) {
    return null;
  }
  return [
    'message' => $error->getMessage(),
    'file' => $error->getFile(),
    'line' => $error->getLine(),
  ];
}

function request()
{
  return json_decode(file_get_contents("php://input"), true);
}

function sanitizeRequest(?array $request, array $keys): array
{
  return array_merge(...array_map(fn ($key): array => [$key => $request[$key] ?? null], $keys));
}

function app($class)
{
  return new $class();
}
