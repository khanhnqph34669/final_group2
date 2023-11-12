<?php
namespace Ductong\BaseMvc\Controllers\Author;

use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models\Author;


class AuthorController extends Controller{
    public function index(){
        $this->render('author/index');
    }
}

?>