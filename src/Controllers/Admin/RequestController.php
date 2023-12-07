<?php

namespace Ductong\BaseMvc\Controllers\Admin;

use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models\Categories;
use Ductong\BaseMvc\Models\Post;
use Ductong\BaseMvc\Models\users;


class RequestController extends Controller
{
    public function index()
    {
        $user = new users();
        $users = $user->getAuthorRequest();
        $this->renderAdmin('Requests/index', ['users' => $users]);
    }

    public function accept()
    {
        $id = $_GET['id'];
        $user = new users();
        $user->accept($id); 
        header('Location: /admin/request');
    }

    public function reject()
    {
        $id = $_GET['id'];
        $user = new users();
        $user->reject($id);
        header('Location: /admin/request');
    }
}