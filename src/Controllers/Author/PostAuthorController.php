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

            (new Model())->insert($data);

            header('Location: /author/post');
        }

        $this->renderAuthor("Post/create");
    }

    public function update(){
        if (isset($_POST["btn-submit"])) { 
            $data = [
                'name' => $_POST['name'],
            ];

            $conditions = [
                ['Id', '=', $_GET['Id']],
            ];

            (new Model())->update($data, $conditions);
        }

        $category = (new Model())->findOne($_GET["Id"]);

        $this->renderAuthor("Post/update", ["category" => $category]);
    }

    public function delete(){

    }

}
?>