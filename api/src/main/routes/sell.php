<?php

namespace Src\Main\Routes;

use Router;
use Src\Main\Factories\Application\Controllers\Sell\MakeDeleteSellController;
use Src\Main\Factories\Application\Controllers\Sell\MakeInsertSellController;
use Src\Main\Factories\Application\Controllers\Sell\MakeListSellsController;
use Src\Main\Factories\Application\Controllers\Sell\MakeShowSellController;
use Src\Main\Factories\Application\Controllers\Sell\MakeUpdateSellController;

Router::get('/sells', app(MakeListSellsController::class), ['auth']);
Router::get('/sells/:id', app(MakeShowSellController::class), ['auth']);
Router::post('/sells', app(MakeInsertSellController::class), ['auth']);
Router::put('/sells/:id', app(MakeUpdateSellController::class), ['auth']);
Router::delete('/sells/:id', app(MakeDeleteSellController::class), ['auth']);
