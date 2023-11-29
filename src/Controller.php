<?php

namespace Ductong\BaseMvc;

use Ductong\BaseMvc\Models\Categories;


class Controller {
    protected function render($view, $data = []) {
        extract($data);
        include "Views/$view.php";
    }
    protected function renderAuthor($view, $data = []) {
        $this->checkLogin();
        include_once 'Views/components/layout/author/header.php';
        extract($data);

        include "Views/author/$view.php";
        include_once 'Views/components/layout/author/footer.php'; 
    }
    
    protected function checkLogin() {
        if (!isset($_SESSION['user'])) {
            header('Location: /auth/login');
        }
    }

    protected function renderAdmin($view, $data = []) {
        $this->checkLogin();
        include_once 'Views/components/layout/admin/header.php';
        
        extract($data);

        include "Views/admin/$view.php";

        include 'src/Views/components/layout/admin/footer.php';
    }
    protected function renderClient($view, $data = []) {
        $data['categories'] = $this->getCategoryData();
        include_once 'Views/components/layout/client/header.php';
        extract($data);

        include "Views/$view.php";
        include_once 'Views/components/layout/client/footer.php';
    }


    private function getCategoryData() {
        $category = new Categories();
        $categories = $category->all();
        return $categories;
    }
}
