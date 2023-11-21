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
                'author_Id'=>2,
                'RejectContent'=>'',
                'categoryPost_id'=>$_POST['CategoryPost_id']
            ];

            $post = new Post();
            $post->insert($data) ;
            header('Location: /author/post/list');

        }
    }

    public function update(){
        
    }

    public function delete(){
    
    }

}
?>