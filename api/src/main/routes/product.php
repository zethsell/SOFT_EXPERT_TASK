<?php

namespace Src\Main\Routes;

use Router;
use Src\Main\Factories\Application\Controllers\Product\MakeDeleteProductController;
use Src\Main\Factories\Application\Controllers\Product\MakeInsertProductController;
use Src\Main\Factories\Application\Controllers\Product\MakeListProductsController;
use Src\Main\Factories\Application\Controllers\Product\MakeShowProductController;
use Src\Main\Factories\Application\Controllers\Product\MakeUpdateProductController;

Router::get('/products', app(MakeListProductsController::class));
Router::get('/products/:id', app(MakeShowProductController::class));
Router::post('/products', app(MakeInsertProductController::class));
Router::put('/products/:id', app(MakeUpdateProductController::class));
Router::delete('/products/:id', app(MakeDeleteProductController::class));
