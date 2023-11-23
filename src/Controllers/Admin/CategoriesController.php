<?php

namespace Ductong\BaseMvc\Controllers\Admin;

use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models\Categories;


class CategoriesController extends Controller
{
    public function deleteCategory() {
        
        $condition = [
            ['id', '=', $_GET['id']],
        ];
        $category = new Categories();
        $category->delete($condition);
        header('Location: /admin/category');
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
            $this->renderAdmin('Categories/create');
        }
    }
}