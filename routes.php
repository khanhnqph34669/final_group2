<?php

use Ductong\BaseMvc\Controllers\Admin\AdminController;
use Ductong\BaseMvc\Controllers\Client\HomeController;
use Ductong\BaseMvc\Controllers\Author\AuthorController;
use Ductong\BaseMvc\Controllers\Admin\PostController;
use Ductong\BaseMvc\Controllers\AuthenticatorController;



use Ductong\BaseMvc\Router;

$router = new Router();
//Routes for client
$router->addRoute('/', HomeController::class, 'index');


//Routes for admin
$router->addRoute('/admin', AdminController::class, 'index');
$router->addRoute('/admin/post', PostController::class, 'index');
$router->addRoute('/admin/post/create', AdminController::class, 'createPost');


//Routes for author
$router->addRoute('/author', AuthorController::class, 'index');
$router->addRoute('/author/post', AuthorController::class, 'list');

//Routes for authenticator
$router->addRoute('/login', AuthenticatorController::class, 'index');
$router->addRoute('/login/submit', AuthenticatorController::class, 'login');
$router->addRoute('/logout', AuthenticatorController::class, 'logout');