<?php
namespace Ductong\BaseMvc\Controllers\Author;


use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models\Categories;
use Ductong\BaseMvc\Models\users;

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

    public function createPage(){
        $category = new Categories();
        $categories = $category->all();
        $author = new users();
        $tacgia = $author->findOne($_SESSION['id']);
        $this->renderAuthor("Post/create",['categories'=>$categories,'authors'=>$tacgia]);
    }
    // public function list() {
    //     $this->renderAuthor('author/Post/listpost');
    // }
}