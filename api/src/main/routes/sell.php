<?php

namespace Src\Main\Routes;

use Router;
use Src\Main\Factories\Application\Controllers\Sell\MakeDeleteSellController;
use Src\Main\Factories\Application\Controllers\Sell\MakeInsertSellController;
use Src\Main\Factories\Application\Controllers\Sell\MakeListSellsController;
use Src\Main\Factories\Application\Controllers\Sell\MakeShowSellController;
use Src\Main\Factories\Application\Controllers\Sell\MakeUpdateSellController;

Router::get('/sells', app(MakeListSellsController::class));
Router::get('/sells/:id', app(MakeShowSellController::class));
Router::post('/sells', app(MakeInsertSellController::class));
Router::put('/sells/:id', app(MakeUpdateSellController::class));
Router::delete('/sells/:id', app(MakeDeleteSellController::class));
