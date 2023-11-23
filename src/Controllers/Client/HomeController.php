<?php

namespace Ductong\BaseMvc\Controllers\Client;

use Ductong\BaseMvc\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $this->renderClient('client/index');
    }

    public function tintuc()
    {
        $this->renderClient('client/tintuc');
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
}
