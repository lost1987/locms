<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-5
 * Time: 下午1:49
 * To change this template use File | Settings | File Templates.
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Login extends Core{


    function login()
    {
        $this->loginModel = new Login_m();
    }

    function index(){
        check_login();
        $this -> tpl -> display('index.html');
    }


    public function loginpage()
    {
        $this->tpl->assign('error_msg','');
        $this->tpl->display('login.html');
    }

    public function  dologin(){
        $username = $this -> input -> post('username');
        $password = $this -> input -> post('password');

        if( ($info = $this->loginModel->loginValidation($username,$password) ) !== FALSE && !empty($username) && !empty($password)){
            //success
            $this -> cookie -> set_userdata('admin',$username);
            $this -> cookie -> set_userdata('admin_id',$info['id']);
            $this -> cookie -> set_userdata('truename',$info['truename']);

            $this -> tpl -> display('index.html');
            exit;
        }

        $this->tpl->assign('error_msg','登录失败！');
        $this->tpl->display('login.html');
    }

}
