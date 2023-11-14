<?php
namespace Ductong\BaseMvc\Controllers\Admin;


use Ductong\BaseMvc\Controller;


class AdminController extends Controller
{
    public function index() {
        $this->renderAdmin('admin/index');
    }
}