<?php
namespace Ductong\BaseMvc\Controllers\Author;


use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Model;
use Ductong\BaseMvc\Models\Post;

class PostAuthorController extends Controller
{
    public function listpost(){
        $post = new Post();
        $posts = $post->all(); 
        $this->renderAuthor('Post/listpost',['posts'=>$posts]);
    }

    public function create(){
        if (isset($_POST["btn-submit"])) { 
            $data = [
                'name' => $_POST['name'],
            ];

            (new Post())->insert($data);

            header('Location: /author/Post');
        }

        $this->renderAuthor("Post/create");
    }

    public function update(){
        if (isset($_POST["btn-submit"])) { 
            $data = [
                'name' => $_POST['name'],
            ];

            $conditions = [
                ['id', '=', $_GET['id']],
            ];

            (new Post())->update($data, $conditions);
        }

        $category = (new Post())->findOne($_GET["id"]);

        $this->renderAuthor("Post/update", ["category" => $category]);
    }

    public function delete(){

    }

}
?>