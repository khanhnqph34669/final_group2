<?php

namespace Ductong\BaseMvc\Controllers\Admin;


use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models\Post;
use Ductong\BaseMvc\Models\users;

class PostController extends Controller
{
    public function index()
    {
        $post = new Post();
        $posts = $post->all();
        $author = new users();
        $authors = $author->all();
        $this->renderAdmin('Posts/index', ['posts' => $posts, 'authors' => $authors]);
    }

    public function create()
    {
        if (isset($_POST['submit-post'])) {
            $img = $_FILES['image']['name'];
            $target_dir = "public/images/";
            $target_file = $target_dir . basename($img);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            $data = [
                'Title'=>$_POST['title'],
                'Content'=>$_POST['content'],
                'ImageUrl'=> $target_file,
                'Status'=>3,
                'CreateAt'=>date('Y-m-d H:i:s'),
                'author_Id'=>$_POST['author'],
                'RejectContent'=>'',
                'categoryPost_id'=>$_POST['categoryPost_id']
            ];
            (new Post())->insert($data);
            header('Location: /admin/post');
        } else {
            header('Location: /admin/post/create');
        }
    }
}
