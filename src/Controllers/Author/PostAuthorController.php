<?php
namespace Ductong\BaseMvc\Controllers\Author;


use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models;
use Ductong\BaseMvc\Models\Post;
use Ductong\BaseMvc\Models\postStatus;
use Ductong\BaseMvc\Models\users;
use Ductong\BaseMvc\Models\Categories;
use Ductong\BaseMvc\Models\postComments;

class PostAuthorController extends Controller
{
    public function listpost(){
        $post = new Post();
        $posts = $post->findPost($_SESSION['id']);
        $category = new Categories();
        $categories = $category->all();
        $author = new users();
        $authors = $author->findOne($_SESSION['id']);
        $this->renderAuthor('Post/listpost',['posts'=>$posts,'categories'=>$categories,'authors'=>$authors]);
    }


    public function create(){
        if (isset($_POST["btn-submit"])) { 
            $data['ImageUrl'] = null;
            $img = $_FILES['ImageUrl'] ?? null;
            if ($img) {

                // Đường dẫn lưu DB vì thư mục upload cùng cấp với index.php
                // Khi lưu vào DB, chú ý là trước uploads có dấu /
                $pathSaveDB = '../Public/img/' . $img['name'];

                // Đường dẫn upload có thêm __DIR__ . '/../../../'
                // vì File ProductController của mình đang cách thư mục uploads 3 cấp
                // Nên sẽ thấy có 3 lần ../
                // __DIR__ là 2 const mặc định của PHP để lấy ra đường dẫn thư mục hiện tại của ProductController 
                $pathUpload = __DIR__ . '../../../../Public/img/' . $img['name'];

                if (move_uploaded_file($img['tmp_name'], $pathUpload)) { 
                    $data['ImageUrl'] = $pathSaveDB;
                } 
            $data = [
                'Title'=>$_POST['Title'],
                'Content'=>$_POST['Content'],
                'Status'=>2,
                'ImageUrl'=>$pathSaveDB,
                'CreateAt'=>date('Y-m-d H:i:s'),
                'author_Id'=>$_POST['author_Id'],
                'RejectContent'=>'',
                'categoryPost_id'=>$_POST['CategoryPost_id']
            ];

            $post = new Post();
            $post->insert($data) ;
            header('Location: /author/post/list');

        }
    }
    }
    public function delete() {
        $postId = $_GET['id'];
        $conditions = [
            ['id', '=', $_GET['id']],
        ];
        $comment = new postComments();
            $comments = $comment->findComment($postId);
    
            if (!empty($comments)) {
                // Tạo điều kiện để xóa bình luận
                $conditionsComment = [
                    ['PostId', '=', $postId],
                ];
    
                $comment->delete($conditionsComment);
            }
        (new Post())->delete($conditions);

        header('Location: /author/post/list');
    }

    public function update() {
        if (isset($_POST["btn-submit"])) { 
            
            // $img = $_FILES['ImageUrl'];
            // $pathSaveDB = '../Public/img/' . $img['name'];
            $data = [
                'Title'=>$_POST['Title'],
                'Content'=>$_POST['Content'],
                'Status'=>2,
                // 'ImageUrl'=>$pathSaveDB,
                'CreateAt'=>date('Y-m-d H:i:s'),
                'author_Id'=>$_POST['author_Id'],
                'RejectContent'=>'',
                'categoryPost_id'=>$_POST['CategoryPost_id']
            ];

            
            $conditions = [
                ['id', '=', $_GET['id']],
            ];
            $data['ImageUrl'] = $_POST['img_current'];
            $img = $_FILES['ImageUrl'] ?? null;
            $flag = false;
            if ($img) {

                $pathSaveDB = '../Public/img/' . $img['name'];
                $pathUpload = __DIR__ . '../../../../Public/img/' . $img['name'];

                if (move_uploaded_file($img['tmp_name'], $pathUpload)) { 
                    $data['ImageUrl'] = $pathSaveDB;
                    $flag = true;
                } 
            }
                (new Post())->update($data, $conditions);
        }

        $post = (new Post())->findOne($_GET["id"]);
        $author = new users();
        $authors = $author->findOne($_SESSION['id']);
        $category = new Categories();
        $categories = $category->all();
        

        $this->renderAuthor("Post/update", ["post" => $post,'categories'=>$categories,'authors'=>$authors]);
    }
}

?>