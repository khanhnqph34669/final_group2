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
$router->addRoute('/client/chitiet', HomeController::class, 'chitiet');
$router->addRoute('/client/tintuc', HomeController::class, 'tintuc');
$router->addRoute('/client/form', HomeController::class, 'form');
$router->addRoute('/client/dangky', HomeController::class, 'signup');
$router->addRoute('/client/dangnhap', HomeController::class, 'signin');

//Routes for admin
$router->addRoute('/admin', AdminController::class, 'login');
$router->addRoute('/admin/post', PostController::class, 'index');
$router->addRoute('/admin/post/create', AdminController::class, 'createPost');
$router->addRoute('/admin/post/push', PostController::class, 'create');


//Routes for author
$router->addRoute('/author', AuthorController::class, 'login');
$router->addRoute('/author/post', AuthorController::class, 'list');

//Routes for authenticator
$router->addRoute('/login', AuthenticatorController::class, 'index');
$router->addRoute('/login/submit', AuthenticatorController::class,'login');
$router->addRoute('/register', AuthenticatorController::class, 'register');
$router->addRoute('/logout', AuthenticatorController::class, 'indexLogout');
