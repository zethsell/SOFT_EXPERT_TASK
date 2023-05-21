<?php

use Src\Main\Factories\Application\Middlewares\MakeAuthenticationMiddleware;

const MIDDLEWARES = [
  'auth' => MakeAuthenticationMiddleware::class
];
