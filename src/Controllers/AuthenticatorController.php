<?php

namespace Ductong\BaseMvc\Controllers;

use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models\users;
session_start();
class AuthenticatorController extends Controller
{
    public function index()
    {
        if(isset($_COOKIE['admin'])){
            $this->renderAdmin('index');
        }
        elseif(isset($_COOKIE['client'])){
            $this->render('index');
        }
        elseif(isset($_COOKIE['author'])){
            $this->renderAuthor('author');
        }
        else{
            $this->render('login');
        }
    }
    public function login()
    {
        
       if(isset($_POST['submit'])){
        $data = [
            'Email' => $_POST['email'],
            'Password' => $_POST['password']
        ];
        $result = (new users())->getUserByEmail($data['Email']);
        if(isset($result['Email'])){
            if($result['Password'] == $data['Password']){
                switch($result['roles_id']){
                    case 1:
                    $_SESSION['login'] == 1;
                    setcookie('admin',true,time()+3600,'/','', true);
                    $this->renderAdmin('index');
                    break;
                    case 2: 
                    $_SESSION['login'] == 2;
                    setcookie('client',true,time()+3600,'/','', true);
                    header ('Location: /');
                    break;
                    case 3:
                    $_SESSION['login'] ==3;
                    $this->renderAuthor('author');
                    break;
                }
            }
            else{
                return $this->render('login',['error'=>'Email or password is incorrect']);
            }
        }
        else{
            return $this->render('login',['error'=>'Email or password is incorrect']);
        }
       }
       else{
           echo "error";
       }
    }

    public function logout(){
       unset($_SESSION['login']);
       $this->render('login');
    }
}
