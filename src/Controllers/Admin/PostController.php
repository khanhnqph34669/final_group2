<?php
namespace Ductong\BaseMvc\Controllers\Admin;


use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models\Post;

class PostController extends Controller
{
    public function index(){
        $post = new Post();
        $posts = $post->all();  
        $this->renderAdmin('Posts/index',['posts'=>$posts]);
    }

}
?>