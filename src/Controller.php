<?php

namespace Ductong\BaseMvc;

class Controller {
    protected function render($view, $data = []) {
        extract($data);
        include "Views/$view.php";
    }
    protected function renderAuthor($view, $data = []) {
        include_once 'Views/components/layout/author/header.php';
        extract($data);

        include "Views/author/$view.php";
        include_once 'Views/components/layout/author/footer.php'; 
    }
    
    protected function renderAdmin($view, $data = []) {
        include_once 'Views/components/layout/admin/header.php';
        
        extract($data);

        include "Views/admin/$view.php";

        include 'src/Views/components/layout/admin/footer.php';
    }
    protected function renderClient($view, $data = []) {
        include_once 'Views/components/layout/client/header.php';

        extract($data);

        include "Views/$view.php";
        include_once 'Views/components/layout/client/footer.php';
    }
}
