<?php
namespace Ductong\BaseMvc\Controllers\Admin;


use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\PostModel\post as PostModelPost;

class AdminController extends Controller
{
    public function index() {
        $this->renderAdmin('index');
    }

    public function list() {
        $this->renderAdmin('Posts/ListPost');
    }

    public function create(){
        $this->renderAdmin('Posts/CreatePost');
    }

    public function insert(){
       if(isset($_POST['submit'])){
        $data = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
        ];
        (new PostModelPost())->insert($data);
        header('Location:Views/admin/Posts/ListPost.php');
       }
       $this->renderAdmin('Posts/ListPost');
       
    }
    }
    