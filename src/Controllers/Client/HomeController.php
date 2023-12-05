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
        $post = new Post();
        $category = new Categories();
        $users = new users();   
        $newpost = $post->getNewPost();
        $categories = $category->all();
        $randomthreecate = $category->getRandomCategory();
        $randompost = $post->getRandomPost();
        $getOnePost = $post->getOnePost();
        $getDiv = $category->getThreeCategory();
        $this->renderClient('client/index',['posts'=>$post, 'users'=>$users, 'randomthreecate'=>$randomthreecate,'randompost'=>$randompost,'categories'=>$categories,'newpost'=>$newpost,'getOnePost'=>$getOnePost,'getDiv'=>$getDiv]);
    }

    public function notfound()
    {
        header("HTTP/1.0 404 Not Found");
        $this->render('client/404');
    }
    public function chitiet()
    {
        $this->renderClient('client/chitiet');
    }

    public function form()
    {
        if($_SESSION['roles']==3&&$_SESSION['Status']!=3&&$_SESSION['Status']==1){
            $user = new users();
            $users = $user->findOne($_SESSION['id']);
            $this->renderClient('client/form', ['users' => $users]);

        }else{
            header('Location: /');
        }
    }
    

    public function tacgia()
{
    if(isset($_POST['btn-submit'])){
        $id = $_SESSION['id'];
        $publicPath = 'public/uploads/';

        if(isset($_FILES['PathPortFolio']['name']) && !empty($_FILES['PathPortFolio']['name'])){
            $file = $_FILES['PathPortFolio'];
            $tmp_name = $file['tmp_name'];
            
            // Tạo tên mới để tránh trùng lặp
            $newName = uniqid().'-'.$file['name'];
            $newName = preg_replace("/[^a-zA-Z0-9_]/", "_", $newName);
            $destination = $publicPath.$newName;

            // Cập nhật dữ liệu
            $data = [

                'Id' => $id,
                'Name' => $_POST['Name'],
                'Status' => 2,
                'Email' => $_POST['Email'],
                'Phone' => $_POST['Phone'],
                'Password' => $_POST['Password'],
                'Address' => $_POST['Address'],
                'roles_id' => 3,
                'PathPortFolio' => $newName, 
            ];
            $condition = [
                ['Id', '=', $id]
              ];
            if(move_uploaded_file($tmp_name, $destination)){
                $user = new users();
                $user->update($data , $condition);
                header('Location: /');
                exit('<script>alert("Đăng ký thành công");</script>');
            } else {
                $err = 'Upload file thất bại';
            }
        } else {
            header('Location: /client/form');
            exit('<script>alert("Bạn chưa chọn file");</script>');
        }
    }
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
}
