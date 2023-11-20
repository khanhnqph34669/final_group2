<?php

namespace Ductong\BaseMvc\Controllers\Admin;

use Ductong\BaseMvc\Controller;
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
        $this->renderAdmin('Posts/createPost');
    }


}
