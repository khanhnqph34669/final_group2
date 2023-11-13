<?php

use Ductong\BaseMvc\Controllers\Admin\UserController;
use Ductong\BaseMvc\Controllers\Admin\CategoryController;
use Ductong\BaseMvc\Controllers\Client\HomeController;
use Ductong\BaseMvc\Controllers\Author\AuthorController;
use Ductong\BaseMvc\Controllers\Admin\PostController;
use Ductong\BaseMvc\Router;

$router = new Router();
//Routes for client
$router->addRoute('/', HomeController::class, 'index');


//Routes for admin
$router->addRoute('/admin', UserController::class, 'index');
$router->addRoute('/admin/users/create', UserController::class, 'create');
$router->addRoute('/admin/users/update', UserController::class, 'update');
$router->addRoute('/admin/users/delete', UserController::class, 'delete');
$router->addRoute('/admin/categories', CategoryController::class, 'index');
$router->addRoute('/admin/categories/create', CategoryController::class, 'create');
$router->addRoute('/admin/categories/update', CategoryController::class, 'update');
$router->addRoute('/admin/categories/delete', CategoryController::class, 'delete');
$router->addRoute('/admin/posts', PostController::class, 'index');

//Routes for author
$router->addRoute('/author', AuthorController::class, 'index');