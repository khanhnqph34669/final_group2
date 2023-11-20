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

    }

}
?>