<?php

namespace Src\Main\Routes;

use Router;
use Src\Main\Factories\Application\Controllers\Product\MakeDeleteProductController;
use Src\Main\Factories\Application\Controllers\Product\MakeInsertProductController;
use Src\Main\Factories\Application\Controllers\Product\MakeListProductsController;
use Src\Main\Factories\Application\Controllers\Product\MakeShowProductController;
use Src\Main\Factories\Application\Controllers\Product\MakeUpdateProductController;

Router::get('/products', app(MakeListProductsController::class), ['auth']);
Router::get('/products/:id', app(MakeShowProductController::class), ['auth']);
Router::post('/products', app(MakeInsertProductController::class), ['auth']);
Router::put('/products/:id', app(MakeUpdateProductController::class), ['auth']);
Router::delete('/products/:id', app(MakeDeleteProductController::class), ['auth']);
