<?php

namespace Src\Main\Routes;

use Router;
use Src\Main\Factories\Application\Controllers\ProductType\MakeDeleteProductTypeController;
use Src\Main\Factories\Application\Controllers\ProductType\MakeInsertProductTypeController;
use Src\Main\Factories\Application\Controllers\ProductType\MakeListProductTypesController;
use Src\Main\Factories\Application\Controllers\ProductType\MakeShowProductTypeController;
use Src\Main\Factories\Application\Controllers\ProductType\MakeUpdateProductTypeController;

Router::get('/product-type', app(MakeListProductTypesController::class));
Router::get('/product-type/:id', app(MakeShowProductTypeController::class));
Router::post('/product-type', app(MakeInsertProductTypeController::class));
Router::put('/product-type/:id', app(MakeUpdateProductTypeController::class));
Router::delete('/product-type/:id', app(MakeDeleteProductTypeController::class));
