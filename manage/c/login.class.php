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
        $this -> initModulePermission($this->cookie->userdata('permission'));
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

            $ip = getip();
            $this -> loginModel -> updateip($info['id'],$ip);

            $userdata = array(
            	'admin' => $username,
            	'admin_id' => $info['id'],
            	'truename' => $info['truename'],
            	'permission' => $info['permission']
            );
            
            $this -> cookie -> set_userdata($userdata);
            mappingforward('login');
            exit;
        }

        $this->tpl->assign('error_msg','登录失败！');
        $this->tpl->display('login.html');
    }
    
    private function initModulePermission($user_permission){
	    foreach($this->permission->getPermissions() as $k => $p){
		    if($this->permission->hasPermission($user_permission,$p['value'])){
			    $this -> tpl -> assign($p['displayModuleId'],'style="display:block"');
			    continue;
		    }
		    $this -> tpl -> assign($p['displayModuleId'],'style="display:none"');
	    }
    }
    
    public function logout(){
	    $this -> cookie -> sess_destroy();
	    $this -> tpl->assign('error_msg','');
	    $this -> tpl -> display('login.html');
    }

}
