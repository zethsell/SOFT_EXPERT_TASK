<?php

namespace Src\Main\Routes;

use Router;
use Src\Main\Factories\Application\Controllers\Auth\MakeSignInController;
use Src\Main\Factories\Application\Controllers\Auth\MakeSignUpController;

Router::post('/sign-in', app(MakeSignInController::class));
Router::post('/sign-up', app(MakeSignUpController::class));
