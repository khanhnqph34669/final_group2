<?php

namespace Ductong\BaseMvc\Controllers\Admin;


use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models\Post;
use Ductong\BaseMvc\Models\users;
use Ductong\BaseMvc\Models\Categories;
use Ductong\BaseMvc\Models\postComments;

class PostController extends Controller
{
    public function index()
    {
        $post = new Post();
        $posts = $post->all();
        $author = new users();
        $authors = $author->all();
        $this->renderAdmin('Posts/index', ['posts' => $posts, 'authors' => $authors]);
    }
    public function myPost()
    {       
        $post = new Post();
        $posts = $post->findPost($_SESSION['id']);
        $author = new users();
        $authors = $author->all();
        $this->renderAdmin('Posts/myPost', ['posts' => $posts, 'authors' => $authors]);
    }

    public function create()
    {
        if (isset($_POST['submit-post'])) {
            if ($_POST['title'] != null && $_POST['content'] != null && $_FILES["image"]["name"] != null) {
                $target_dir = "Public/img/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
    {
        if (isset($_POST['submit-post'])) {
            if ($_POST['title'] != null && $_POST['content'] != null && $_FILES["image"]["name"] != null) {
                $target_dir = "Public/img/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);

                if ($_FILES["image"]["name"] != null) {
                    // Thay đổi tên file để tránh trùng lặp
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                if ($_FILES["image"]["name"] != null) {
                    // Thay đổi tên file để tránh trùng lặp
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);

                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        $data = [
                            'Title' => $_POST['title'],
                            'Content' => $_POST['content'],
                            'ImageUrl' => $target_file,
                            'Status' => 3,
                            'CreateAt' => date('Y-m-d H:i:s'),
                            'author_Id' => $_POST['author'],
                            'RejectContent' => '',
                            'categoryPost_id' => $_POST['categoryPost_id']
                        ];
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        $data = [
                            'Title' => $_POST['title'],
                            'Content' => $_POST['content'],
                            'ImageUrl' => $target_file,
                            'Status' => 3,
                            'CreateAt' => date('Y-m-d H:i:s'),
                            'author_Id' => $_POST['author'],
                            'RejectContent' => '',
                            'categoryPost_id' => $_POST['categoryPost_id']
                        ];

                        (new Post())->insert($data);
                        header('Location: /admin/post');
                    } else {
                        echo "Có lỗi khi di chuyển file.";
                    }
                } else {
                    header('Location: /admin/post/create');
                }
            } else {
                $thongbao = "Bạn chưa nhập đủ thông tin";
                $category = new Categories();
                $categories = $category->all();
                $author = new users();
                $authors = $author->findOne($_SESSION['id']);
                $this->renderAdmin('Posts/createPost', ['categories' => $categories, 'authors' => $authors, 'thongbao' => $thongbao]);
            }
        }
    }


    public function update()
    {

        if (isset($_POST["submit-update"])) {
            $data = [
                'Title' => $_POST['title'],
                'Content' => $_POST['content'],
                'Status' => 3,
                'CreateAt' => date('Y-m-d H:i:s'),
                'author_Id' => $_POST['author'],
                'RejectContent' => '',
                'categoryPost_id' => $_POST['category']
            ];

            if($_FILES['image']['name']==null){
                $data['ImageUrl'] = $_POST['img_current'];
            }else{
                $target_dir = "Public/img/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);

                if ($_FILES["image"]["name"] != null) {
                    // Thay đổi tên file để tránh trùng lặp
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);

                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        $data['ImageUrl'] = $target_file;
                    } else {
                        echo "Có lỗi khi di chuyển file.";
                    }
                } else {
                    header('Location: /admin/post/create');
                }
            }

            $conditions = [
                ['id', '=', $_GET['id']],
            ];

            (new Post())->update($data, $conditions);

        }
        $post = new Post();
        $posts = $post->findOne($_GET['id']);
        $category = new Categories();
        $categories = $category->all();
        $author = new users();
        $authors = $author->all();

        $this->renderAdmin('Posts/updatePost',['categories'=>$categories,'authors'=>$authors,'posts'=>$posts]);
        }


        public function delete()
        {
            if (isset($_GET['id'])) {
                $postId = $_GET['id'];
        
                // Tạo điều kiện để xóa bài viết
                $conditionsPost = [
                    ['id', '=', $postId],
                ];
        
                // Kiểm tra nếu có bình luận, xóa bình luận trước
                $comment = new postComments();
                $comments = $comment->findComment($postId);
        
                if (!empty($comments)) {
                    // Tạo điều kiện để xóa bình luận
                    $conditionsComment = [
                        ['PostId', '=', $postId],
                    ];
        
                    $comment->delete($conditionsComment);
                }
        
                // Xóa bài viết
                $post = new Post();
                $post->delete($conditionsPost);
        
                header('Location: /admin/post');
                exit();
            }
        }
        
    
    public function accept()
    {
        
        $oldData = new Post();
        $oldData = $oldData->findPostEditStatus($_GET['id'],2);
        $data = [
            'Title' => $oldData['Title'],
            'Content' => $oldData['Content'],
            'ImageUrl' => $oldData['ImageUrl'],
            'Status' => 3,
            'CreateAt' => $oldData['CreateAt'],
            'author_Id' => $oldData['author_Id'],
            'RejectContent' => '',
            'categoryPost_id' => $oldData['categoryPost_id']
        ];
        $conditions = [
            ['id', '=', $_GET['id']],
        ];
        (new Post())->update($data, $conditions);
        header('Location: /admin/post');
    }

    
}
