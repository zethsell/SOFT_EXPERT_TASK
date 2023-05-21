<?php

namespace Src\Main\Routes;

use Router;
use Src\Main\Factories\Application\Controllers\User\MakeDeleteUserController;
use Src\Main\Factories\Application\Controllers\User\MakeInsertUserController;
use Src\Main\Factories\Application\Controllers\User\MakeListUsersController;
use Src\Main\Factories\Application\Controllers\User\MakeShowUserController;
use Src\Main\Factories\Application\Controllers\User\MakeUpdateUserController;

Router::get('/users', app(MakeListUsersController::class), ['auth']);
Router::get('/users/:id', app(MakeShowUserController::class), ['auth']);
Router::post('/users', app(MakeInsertUserController::class), ['auth']);
Router::put('/users/:id', app(MakeUpdateUserController::class), ['auth']);
Router::delete('/users/:id', app(MakeDeleteUserController::class), ['auth']);
