<?php
namespace Ductong\BaseMvc\Controllers\Author;


use Ductong\BaseMvc\Controller;


class AuthorController extends Controller
{
    public function index() {
        $this->renderAuthor('author/index');
    }
}