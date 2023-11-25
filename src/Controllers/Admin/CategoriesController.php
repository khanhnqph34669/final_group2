<?php

namespace Ductong\BaseMvc\Controllers\Admin;

use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models\Categories;


class CategoriesController extends Controller
{
    // public function deleteCategory() {
        
    //     $condition = [
    //         ['id', '=', $_GET['id']],
    //     ];
    //     $category = new Categories();
    //     $category->delete($condition);
    //     header('Location: /admin/category');
    // }

    // public function deleteCategory() {
    //     // Kiểm tra xem có id được truyền qua không
    //     if (isset($_GET['id'])) {
    //         $categoryId = $_GET['id'];
    //         $condition = [
    //             ['id', '=', $categoryId],
    //         ];
    //         $category = new Categories();
    //         $categoryD= $category->findOne($categoryId);
    //         $folderPath = 'src/Views/client/';
    //         $fileName = urlencode($categoryD['name']); // Sử dụng urlencode để mã hóa tên file
    //         $fileToDelete = $folderPath . $fileName .  '.php';
    //         var_dump($fileToDelete);
    //         die();
    //         unlink($fileToDelete);
    //         $category->delete($condition);
    //         header('Location: /admin/category');
    //         exit; 
    //     }
    
    //     // Nếu không có id, chuyển hướng về trang quản lý danh mục
    //     header('Location: /admin/category');
    //     exit; // Chắc chắn rằng không có mã PHP khác thực thi sau header
    // }
    


    public function deleteCategory() {
        // Kiểm tra xem có id được truyền qua không
        if (isset($_GET['id'])) {
            $categoryId = $_GET['id'];
            $condition = [
                ['id', '=', $categoryId],
            ];
            $category = new Categories();
            $categoryD= $category->findOne($categoryId);
            $folderPath = 'src/Views/client/';
            $fileName = urlencode($categoryD['name']); // Sử dụng urlencode để mã hóa tên file
            $fileToDelete = $folderPath . $fileName .  '.php';
                    // var_dump($fileToDelete);
                    // die();
            if (file_exists($fileToDelete)) {
                unlink($fileToDelete);
            } 
    
            $category->delete($condition);
            header('Location: /admin/category');
            exit; 
        }
    
        // Nếu không có id, chuyển hướng về trang quản lý danh mục
        header('Location: /admin/category');
        exit;
    }
    

    public function create() {
        if (isset($_POST['submit-category'])) {
            if ($_POST['name'] != null) {
                $data = [
                    'Name' => $_POST['name'],
                    'CreateAt' => date('Y-m-d H:i:s'),
                ];
                (new Categories())->insert($data);
                header('Location: /admin/category');
            } else {
                header('Location: /admin/category/create');
            }
        } else {
            $this->renderAdmin('Categories/createCategory');
        }
    }

    



    // public function createPush() {
    //     if (isset($_POST['submit-category'])) {
    //         if ($_POST['name'] != null) {
    //             $data = [
    //                 'name' => $_POST['name'],
    //             ];
    //             (new Categories())->insert($data);
    //             header('Location: /admin/category');
    //         } else {
    //             header('Location: /admin/category/create');
    //         }
    //     } else {
    //         $this->renderAdmin('Categories/createCategory');
    //     }
    // }
    public function createPush()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Kiểm tra nếu có dữ liệu được gửi qua POST
            $name = $_POST['name'] ?? null;
    
            if ($name !== null) {
                // Nếu có tên danh mục, thêm vào cơ sở dữ liệu
                $data = [
                    'name' => $name,
                ];
                (new Categories())->insert($data);
    
                // Đường dẫn đến thư mục
                $folderPath = 'src/Views/client/';
    
                // Tạo tên file mới dựa trên tên danh mục và số lần đã tạo trước đó
                $fileName = str_replace(' ', '', $_POST['name']);
                $newFileName = $fileName  . '.php';
                $newFilePath = $folderPath . $newFileName;
    
                // Tạo nội dung của file
                $fileContent = '<?php echo "This is the main file for category: ' . $name . '"; ?>';
    
                // Tạo file và viết nội dung vào file
                file_put_contents($newFilePath, $fileContent);
    
                header('Location: /admin/category');
                exit; // Chắc chắn rằng không có mã PHP khác thực thi sau header
            }
        }
    
        // Nếu không có dữ liệu POST hoặc tên danh mục không tồn tại, chuyển hướng về trang tạo danh mục
        header('Location: /admin/category/create');
        exit; // Chắc chắn rằng không có mã PHP khác thực thi sau header
    }



}