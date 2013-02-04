<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-11
 * Time: 下午2:41
 * To change this template use File | Settings | File Templates.
 */
class Site extends Core
{

    function site(){
        $this -> permission -> checkPermssion($this->cookie->userdata('permission'),$this->permission->getPermissions('SITE'));
    }

    function index(){
        if(get_magic_quotes_runtime()){
            $settings = unserialize(stripslashes(file_get_contents(BASEPATH.'site.inc.php')));
        }else{
            $settings = unserialize(file_get_contents(BASEPATH.'site.inc.php'));
        }

        $this -> tpl -> assign('settings',$settings);

        $this -> tpl -> display('site.html');
    }

    public function save(){
        $post = $this -> input -> post();
        if(get_magic_quotes_runtime()){
            $settings = serialize(addslashes($post));
        }else{
            $settings = serialize($post);
        }

        if(file_put_contents(BASEPATH.'site.inc.php',$settings)){
            dwz_success();
        }
        dwz_failed();
    }
}
