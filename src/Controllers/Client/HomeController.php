<?php

namespace Ductong\BaseMvc\Controllers\Client;

use Ductong\BaseMvc\Controller;

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
}
