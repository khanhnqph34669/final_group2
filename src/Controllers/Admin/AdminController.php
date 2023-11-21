<?php

namespace Ductong\BaseMvc\Controllers\Admin;

use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models\Categories;
use Ductong\BaseMvc\Models\users;
session_start();
class AdminController extends Controller
{
    public function index() {
        $this->renderAdmin('index');
    }


    public function login(){
        if (!isset($_SESSION['user']) || $_SESSION['roles'] !== 1){
            $this->render('login');
        }
        else{
            $this->index();
        }
    }
    public function createPost(){
        $category = new Categories();
        $categories = $category->all();
        $author = new users();
        $authors = $author->findOne($_SESSION['id']);
        $this->renderAdmin('Posts/createPost',['categories'=>$categories,'authors'=>$authors]);
    }


}
