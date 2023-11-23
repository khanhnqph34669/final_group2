<?php

namespace Ductong\BaseMvc\Controllers\Client;

use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $this->renderClient('client/index');
    }

    
    public function chitiet()
    {
        $this->renderClient('client/chitiet');
    }

    public function form()
    {
        $this->renderClient('client/form');
    }
    public function tacgia()
    {
        $this->renderClient('client/tacgia');
    }
    public function getAllPost(){
        $post = new Post();
        $posts = $post->all();
        $this->renderClient('/client/tintuc',['posts'=>$posts]);
    }
}
