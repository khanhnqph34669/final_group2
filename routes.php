<?php

use Ductong\BaseMvc\Controllers\Admin\AdminController;
use Ductong\BaseMvc\Controllers\Client\HomeController;
use Ductong\BaseMvc\Controllers\Author\AuthorController;
use Ductong\BaseMvc\Controllers\Author\PostAuthorController;
use Ductong\BaseMvc\Controllers\Admin\PostController;
use Ductong\BaseMvc\Controllers\AuthenticatorController;
use Ductong\BaseMvc\Controllers\Admin\CategoriesController;
use Ductong\BaseMvc\Controllers\Admin\RequestController;
use Ductong\BaseMvc\Controllers\Admin\UserController;
use Ductong\BaseMvc\Models\Categories;
use Ductong\BaseMvc\Router;

$router = new Router();
//Routes for client
$router->addRoute('/', HomeController::class, 'index');
$router->addRoute('/client/chitiet', HomeController::class, 'chitiet');
$router->addRoute('/client/technology', HomeController::class, 'getAllPost');
$router->addRoute('/client/review', HomeController::class, 'getAllPost');
$router->addRoute('/client/tips', HomeController::class, 'getAllPost');
$router->addRoute('/client/news', HomeController::class, 'getAllPost');
$router->addRoute('/client/form', HomeController::class, 'form');
$router->addRoute('/client/authorRequest', HomeController::class,'tacgia');
$router->addRoute('/client/dangky', AuthenticatorController::class, 'signUp');
$router->addRoute('/client/category', HomeController::class, 'getAllPostById');
$router->addRoute('/client/dangnhap', HomeController::class, 'signin');
$router->addRoute('/client/contact', HomeController::class, 'contact');
// $routes->addRoute('/client/post/preview',HomeController::class,'preview');
$router->addRoute('/client/post/preview', HomeController::class, 'preview');
$router->addRoute('/client/comment', HomeController::class, 'comment');
$router->addRoute('/client/search',HomeController::class,'search');



//Routes for admin
$router->addRoute('/admin', AdminController::class, 'login');
$router->addRoute('/admin/post', PostController::class, 'index');
$router->addRoute('/admin/post/myPost', PostController::class, 'myPost');
$router->addRoute('/admin/post/create', AdminController::class, 'createPost');
$router->addRoute('/admin/post/push', PostController::class, 'create');
$router->addRoute('/admin/post/accept', PostController::class, 'accept');
$router->addRoute('/admin/post/reject', PostController::class, 'decline');
$router->addRoute('/admin/post/delete', PostController::class, 'delete');
$router->addRoute('/admin/post/edit', PostController::class, 'update');
$router->addRoute('/admin/category', AdminController::class, 'category');
$router->addRoute('/admin/category/edit', CategoriesController::class, 'edit');
$router->addRoute('/admin/category/update', CategoriesController::class, 'update');
$router->addRoute('/admin/mypost/delete', PostController::class, 'deleteMyPost');
$router->addRoute('/admin/category/create', CategoriesController::class, 'create');
$router->addRoute('/admin/category/push', CategoriesController::class, 'createPush');
$router->addRoute('/admin/category/delete', CategoriesController::class, 'deleteCategory');
$router->addRoute('/admin/request', RequestController::class, 'index');
$router->addRoute('/admin/user', UserController::class, 'index');
$router->addRoute('/admin/user/create', UserController::class, 'createPage');
$router->addRoute('/admin/user/delete', UserController::class, 'delete');
$router->addRoute('/admin/user/edit', UserController::class, 'update');
$router->addRoute('/admin/postRequest', PostController::class,'postRequest');
$router->addRoute('/admin/requests/accept', RequestController::class,'accept');
$router->addRoute('/admin/requests/reject', RequestController::class,'reject');
$router->addRoute('/admin/user/push', UserController::class,'create');



//Routes for author
$router->addRoute('/author', AuthorController::class, 'login');
$router->addRoute('/author/post/list', PostAuthorController::class,'listpost');
$router->addRoute('/author/post/create', AuthorController::class,'createPage');
$router->addRoute('/author/post/create/submit', PostAuthorController::class,'create');
$router->addRoute('/author/post/delete', PostAuthorController::class,'delete');
$router->addRoute('/author/post/update', PostAuthorController::class,'update');
$router->addRoute('/author/postReject', PostAuthorController::class,'postReject');

//Routes for authenticator
$router->addRoute('/login', AuthenticatorController::class, 'index');
$router->addRoute('/login/submit', AuthenticatorController::class, 'login');
$router->addRoute('/sign-up', AuthenticatorController::class, 'signUp');
$router->addRoute('/logout', AuthenticatorController::class, 'indexLogout');


// Xử lý trường hợp không khớp với bất kỳ đường dẫn nào

$router->setFallback(HomeController::class, 'notFound');