<?php
namespace Ductong\BaseMvc\Controllers\Admin;


use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models\Post;
use Ductong\BaseMvc\Models\users;

class PostController extends Controller
{
    public function index(){
        $post = new Post();
        $posts = $post->all();  
        $author = new users();
        $authors = $author->all();
        $this->renderAdmin('Posts/index',['posts'=>$posts,'authors'=>$authors]);
    }

    public function create(){
        if(isset($_POST['submit-post'])){
            $data = [
                'Title' => $_POST['title'],
                'Content' => $_POST['content'],
                'author_Id' => $_POST['author'],
                'categoryPost_id' => $_POST['category'],
                'Status' => 3,

            ];
            $post = new Post();
            $post->insert($data);
            header('Location: /admin/post');
        }
        else{
            header('Location: /admin/post/create');

        }
    }

}
?>