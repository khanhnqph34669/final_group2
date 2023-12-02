<?php

namespace Ductong\BaseMvc\Controllers\Client;

use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models\Post;
use Ductong\BaseMvc\Models\Categories;
use Ductong\BaseMvc\Models\users;
use Ductong\BaseMvc\Models\postComments;

class HomeController extends Controller
{
    public function index()
    {
        $this->renderClient('client/index');
    }

    public function chitiet()
    {
        $this->renderClient('client/chitiet');
    }

    public function form()
    {
        $user = new users();
        $users = $user->findOne($_SESSION['roles']);
        $this->renderClient('client/form',['users' => $users]);
    }

    public function tacgia()
    {
        if(isset($_POST['submit'])){
            $data = [
                'Id'=> $_POST['Id'],
                'Name'=> $_POST['Name'],
                'Status'=>2,
                'Email'=> $_POST['Email'],
                'Phone'=> $_POST['Phone'],
                'Password'=> $_POST['Password'],
                'Address'=> $_POST['Address'],
                'roles_id'=>2,
            ];
        }

        $this->renderClient('client/index');
    }
    public function getAllPostById()
    {
        $id = $_GET['id'];
        $category = new Categories();
        $categories = $category->all();
        $post = new Post();
        $posts = $post->getAllPostsByCategory($id);
        $author = new users();
        $authors = $author->all();
        $categories = $category->all();
        
        $this->renderClient('client/category', ['posts' => $posts, 'categories' => $categories, 'authors' => $authors]);
    }


    public function contact()
    {
        
        $this->renderClient('client/contact');
    }

    public function preview(){
        $id = $_GET['id'];
        $post = new Post();
        $posts = $post->findOne($id);
        $author = new users();
        $authors = $author->all();
        $comment = new postComments();
        $comments = $comment->getCommentById($id);
        $getRandomPost = $post->getRandomPost();
        $this->renderClient('client/detailPost', ['posts' => $posts, 'authors' => $authors, 'comments' => $comments,'getRandomPost' => $getRandomPost]);
    }

    public function comment(){
       if(isset($_POST['btn-submit'])){
        $id = $_POST['post_Id'];
        $user = $_POST['user_Id'];
        $data = [
            'PostId' => $id,
            'UserId' => $user,
            'Comment' => $_POST['comment'],
            'CreatedAt' => date("Y-m-d H:i:s"),    
        ];
        var_dump($data);
        $comment = new postComments();
        $comment->insert($data);
        header('Location: /client/post/preview?id='.$_POST['post_Id']);
    }

}

    public function request(){
        
    }
}
