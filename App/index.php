<?php

use App\Controllers\ProductController;
use App\Controllers\UserController;
use App\Routes\Routes;

require_once 'vendor/autoload.php';

$userController = new UserController();
$productController = new ProductController();

/**
 * Routes User
 */
Routes::get('/users', function () use ($userController) {
    $userController->index();
});

Routes::get('/user', function () use ($userController) {
    $userController->show();
});

Routes::post('/user', function () use ($userController) {
    $userController->store();
});

Routes::put('/user', function () use ($userController) {
    $userController->update();
});

Routes::Get('/users-products', function () use ($userController) {
    $userController->userProducts();
});

/**
 * Routes Product
 */
Routes::get('/products', function () use ($productController) {
    $productController->index();
});

Routes::get('/products', function () use ($productController) {
    $productController->show();
});

Routes::post('/products', function () use ($productController) {
    $productController->store();
});

Routes::put('/products', function () use ($productController) {
    $productController->update();
});

Routes::run();