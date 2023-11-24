<?php

namespace Ductong\BaseMvc\Controllers\Admin;

use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models\Categories;
use Ductong\BaseMvc\Models\users;
use Ductong\BaseMvc\Models\Post;

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

    public function updatePage(){
        $post = new Post();
        $posts = $post->findOne($_GET['id']);
        $category = new Categories();
        $categories = $category->all();
        $author = new users();
        $authors = $author->all();
        $this->renderAdmin('Posts/updatePost',['categories'=>$categories,'authors'=>$authors,'posts'=>$posts]);
    }


    public function category() {
        $category = new Categories();
        $categories = $category->all();
        $checkPost = new Post();
        $checkPosts = [];
    
        foreach ($categories as $category) {
            $categoryId = $category['id'];
            $postCount = $checkPost->countPostsByCategory($categoryId);
            $checkPosts[$categoryId] = $postCount;
        }
    
        $this->renderAdmin('Categories/index', ['categories' => $categories, 'checkPosts' => $checkPosts]);
    }

    

    

}
