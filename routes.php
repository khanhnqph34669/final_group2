<?php

use Ductong\BaseMvc\Controllers\Admin\AdminController;
use Ductong\BaseMvc\Controllers\Client\HomeController;
use Ductong\BaseMvc\Controllers\Author\AuthorController;
use Ductong\BaseMvc\Controllers\Author\PostAuthorController;
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
$router->addRoute('/client/tacgia', HomeController::class, 'tacgia');


//Routes for admin
$router->addRoute('/admin', AdminController::class, 'login');
$router->addRoute('/admin/post', PostController::class, 'index');
$router->addRoute('/admin/post/myPost', PostController::class, 'myPost');
$router->addRoute('/admin/post/create', AdminController::class, 'createPost');
$router->addRoute('/admin/post/push', PostController::class, 'create');
$router->addRoute('/admin/post/delete', PostController::class, 'delete');
$router->addRoute('/admin/post/edit', PostController::class, 'update');


//Routes for author
$router->addRoute('/author', AuthorController::class, 'login');
// $router->addRoute('/author/post', AuthorController::class, 'list');
$router->addRoute('/author/post/list', PostAuthorController::class, 'listpost');
$router->addRoute('/author/post/create', PostAuthorController::class, 'create');
$router->addRoute('/author/post/delete', PostAuthorController::class, 'delete');
$router->addRoute('/author/post/update', PostAuthorController::class, 'update');

//Routes for authenticator
$router->addRoute('/login', AuthenticatorController::class, 'index');
$router->addRoute('/login/submit', AuthenticatorController::class, 'login');
$router->addRoute('/sign-up', AuthenticatorController::class, 'signUp');
$router->addRoute('/logout', AuthenticatorController::class, 'indexLogout');
