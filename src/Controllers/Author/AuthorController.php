<?php
namespace Ductong\BaseMvc\Controllers\Author;


use Ductong\BaseMvc\Controller;

session_start();
class AuthorController extends Controller
{
    public function index() {
        $this->renderAuthor('index');
    }

    public function login(){
        if (!isset($_SESSION['user']) || $_SESSION['roles'] !== 2){
            $this->render('login');
        }
        else{
            $this->index();
        }
    }
    // public function list() {
    //     $this->renderAuthor('author/Post/listpost');
    // }
}