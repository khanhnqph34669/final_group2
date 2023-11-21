<?php
namespace Ductong\BaseMvc\Controllers\Author;


use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models;
use Ductong\BaseMvc\Models\Post;
use Ductong\BaseMvc\Models\postStatus;
use Ductong\BaseMvc\Models\users;
use Ductong\BaseMvc\Models\Categories;

class PostAuthorController extends Controller
{
    public function listpost(){
        $post = new Post();
        $posts = $post->all(); 
        $postStatus = new PostStatus();
        $poststatus = $postStatus->all();
        $this->renderAuthor('Post/listpost',['posts'=>$posts,'postStatus'=>$postStatus]);
    }


    public function create(){
        if (isset($_POST["btn-submit"])) { 
            $data = [
                'Title'=>$_POST['Title'],
                'Content'=>$_POST['Content'],
                'ImageUrl'=> '',
                'Status'=>2,
                'CreateAt'=>date('Y-m-d H:i:s'),
                'author_Id'=>$_POST['Author'],
                'RejectContent'=>'',
                'categoryPost_id'=>$_POST['CategoryPost_id']
            ];

            $post = new Post();
            $post->insert($data) ;
            header('Location: /author/post/list');

        }
    }

    public function update(){
        if (isset($_POST["btn-submit"])) { 
            $data = [
                'Id'=> $_POST["Id"],
                'Title' => $_POST['Title'],
                'Content' => $_POST['Content'],
                'ImageUrl' => $_POST['ImageUrl'],
                'CreateAt' => $_POST['CreateAt'],
                'Status' => $_POST['Status'],
                'categoryPost_id' => $_POST['categoryPost_id'],
                'RejectContent' => $_POST['RejectContent'],
                'author_Id' => $_POST['author_Id'],
                'ViewCount' => $_POST['ViewCount'],
                'VoteAvg' => $_POST['VoteAvg'],
                'VoteCount' => $_POST['VoteCount']
                
            ];

            $conditions = [
                ['id', '=', $_GET['id']],
            ];
            $post = new Post();
            $posts = $post->all(); 
            $post->update($data, $conditions);
        }
            $post = new Post();
            $posts = $post->all();
            $category = $post->findOne($_GET["id"]);

        $this->renderAuthor("Post/update", ["category" => $category,'posts'=>$posts]);
    }

    public function delete(){
        $conditions = [
            ['id', '=', $_GET['id']],
        ];
        $post = new Post();
        $posts = $post->all();
        (new $post())->delete($conditions);

        header('Location: /author/Post/delete');
    }

}
?>