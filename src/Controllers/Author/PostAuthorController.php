<?php
namespace Ductong\BaseMvc\Controllers\Author;


use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models\Post;

class PostAuthorController extends Controller
{
    public function index(){
        $post = new Post();
        $list = $post->all();
        $this->renderAuthor('Post/listpost',['list'=>$list]);
    }

}
?>