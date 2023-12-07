<?php

namespace Ductong\BaseMvc\Controllers\Admin;

use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models\rolesName;
use Ductong\BaseMvc\Models\users;

class UserController extends Controller{
    public function index(){
        $user = new users();
        $users = $user->all();
        $this->renderAdmin('User/index',['users'=>$users]);
    }
    public function delete(){
        $id = $_GET['id'];
        $user = new users();
        $condition = [
            ['id', '=', $id]
        ];
        $user->delete($condition);
        header('Location: /admin/user');
    }
    public function createPage(){
        $roles = new rolesName();
        $role = $roles->all();
        $this->renderAdmin('User/createUser',['roles'=>$role]);
    }
    public function create(){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $roles = $_POST['roles'];
        $user = new users();
        $data = [
            'Id'=>null,
            'Name'=>$name,
            'Status'=>1,
            'Email'=>$email,
            'Phone'=>$phone,
            'Password'=>$password,
            'Address'=>$address,
            'roles_id'=>$roles,
            'PathPortFolio'=>'',
        ];
        var_dump($data);
        $user->insert($data);
        header('Location: /admin/user');
    }
}