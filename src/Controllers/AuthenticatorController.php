<?php

namespace Ductong\BaseMvc\Controllers;

use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models\users;


class AuthenticatorController extends Controller
{
    public function index()
    {
        if (isset($_SESSION['roles'])==1) {
            $this->renderAdmin('index');
        } elseif (isset($_SESSION['roles'])==3) {
            $this->render('index');
        } elseif (isset($_SESSION['roles'])==2) {
            $this->renderAuthor('author');
        } else {
            $this->render('login');
        }
    }
    public function login()
    {

        if (isset($_POST['submit'])) {
            $data = [
                'Email' => $_POST['email'],
                'Password' => $_POST['password']
            ];
            $result = (new users())->getUserByEmail($data['Email']);
            if (isset($result['Email'])) {
                $user = $result['Name'];
                if ($result['Password'] == $data['Password']) {
                    switch ($result['roles_id']) {
                        case 1:
                            $_SESSION['user'] = $user;
                            $_SESSION['roles'] = $result['roles_id'];
                            $_SESSION['Name'] = $result['Name'];
                            $_SESSION['id'] = $result['Id'];
                            $this->renderAdmin('index');
                            break;
                        case 2:
                            $_SESSION['user'] = $user;
                            $_SESSION['roles'] = $result['roles_id'];
                            $_SESSION['Name'] = $result['Name'];
                            $_SESSION['id'] = $result['Id'];
                            $this->renderAuthor('index');
                            break;
                        case 3:
                            $_SESSION['user'] = $user;
                            $_SESSION['roles'] = $result['roles_id'];
                            $_SESSION['Name'] = $result['Name'];
                            $_SESSION['id'] = $result['id'];    
                            header('Location: /');
                            break;
                    }
                } else {
                    return $this->render('login', ['error' => 'Email or password is incorrect']);
                }
            } else {
                return $this->render('login', ['error' => 'Email or password is incorrect']);
            }
        } else {
            echo "error";
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        unset($_SESSION['roles']);
        unset($_SESSION['Name']);
    }

    public function indexLogout(){ 
        $this->logout();
        header('Location: /');
    }

    public function signUp(){
        if(isset($_POST['submit'])){
            $data = [
                'Name'=> $_POST['FullName'],
                'Email'=> $_POST['Email'],
                'Password'=> $_POST['Password'],
                'Status'=> 1,
                'Phone'=> 0,
                'Address'=> '',
                'roles_id'=>3
            ];
            if($_POST['Confirmpassword']==$_POST['Password']){
                $user = new users();
                $user->insert($data);
                header('Location: login');
                
            } else {
                return $this->render('signUp', ['error' => 'Mật khẩu không trùng']);
            }
        }
        $this->render('signUp');
    }
}
