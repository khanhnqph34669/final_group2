<?php
namespace Ductong\BaseMvc\Controllers\Author;


use Ductong\BaseMvc\Controller;


class AuthorController extends Controller
{
    public function index() {
        $this->renderAuthor('author/index');
    }

    public function list() {
        $this->renderAuthor('author/Post/listpost');
    }

    public function create(){
        $this->renderAuthor('author/Post/create');
    }
}