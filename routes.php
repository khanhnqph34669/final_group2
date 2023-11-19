<?php

use Ductong\BaseMvc\Controllers\Admin\AdminController;
use Ductong\BaseMvc\Controllers\Client\HomeController;
use Ductong\BaseMvc\Controllers\Author\AuthorController;
use Ductong\BaseMvc\Controllers\Author\PostAuthorController;
use Ductong\BaseMvc\Controllers\Admin\PostController;



use Ductong\BaseMvc\Router;

$router = new Router();
//Routes for client
$router->addRoute('/', HomeController::class, 'index');


//Routes for admin
$router->addRoute('/admin', AdminController::class, 'index');
$router->addRoute('/admin/post', PostController::class, 'index');


//Routes for author
$router->addRoute('/author', AuthorController::class, 'index');
$router->addRoute('/author/post', AuthorController::class, 'list');
$router->addRoute('/author/post/listpost', PostAuthorController::class,'index');
$router->addRoute('/author/post/create', AuthorController::class,'create');