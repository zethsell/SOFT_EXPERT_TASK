<?php

$_ENV = parse_ini_file('../../.env');

function envVar(string $key, string $default = null): string
{
  return $_ENV[$key] ?? $default;
}
