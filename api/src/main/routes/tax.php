<?php

namespace Src\Main\Routes;

use Router;
use Src\Main\Factories\Application\Controllers\Tax\MakeDeleteTaxController;
use Src\Main\Factories\Application\Controllers\Tax\MakeInsertTaxController;
use Src\Main\Factories\Application\Controllers\Tax\MakeListTaxsController;
use Src\Main\Factories\Application\Controllers\Tax\MakeShowTaxController;
use Src\Main\Factories\Application\Controllers\Tax\MakeUpdateTaxController;

Router::get('/taxes', app(MakeListTaxsController::class), ['auth']);
Router::get('/taxes/:id', app(MakeShowTaxController::class), ['auth']);
Router::post('/taxes', app(MakeInsertTaxController::class), ['auth']);
Router::put('/taxes/:id', app(MakeUpdateTaxController::class), ['auth']);
Router::delete('/taxes/:id', app(MakeDeleteTaxController::class), ['auth']);
