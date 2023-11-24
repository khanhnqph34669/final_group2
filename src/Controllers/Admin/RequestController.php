<?php

namespace Ductong\BaseMvc\Controllers\Admin;

use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models\Categories;


class RequestController extends Controller
{
    public function index()
    {
        $this->renderAdmin('Requests/index');
    }
}