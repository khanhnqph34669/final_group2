<?php

use Ductong\BaseMvc\Controllers\Admin\AdminController;
use Ductong\BaseMvc\Controllers\Client\HomeController;
use Ductong\BaseMvc\Controllers\Author\AuthorController;



use Ductong\BaseMvc\Router;

$router = new Router();
//Routes for client
$router->addRoute('/', HomeController::class, 'index');


//Routes for admin
$router->addRoute('/admin', AdminController::class, 'index');
$router->addRoute('/admin/post', AdminController::class, 'list');
$router->addRoute('/admin/post/create', AdminController::class, 'create');
$router->addRoute('/admin/post/insert', AdminController::class, 'insert');



//Routes for author
$router->addRoute('/author', AuthorController::class, 'index');
$router->addRoute('/author/post', AuthorController::class, 'list');