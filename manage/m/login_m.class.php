<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-5
 * Time: 下午5:56
 * To change this template use File | Settings | File Templates.
 */
class Login_m extends  Core
{

    function login_m(){
        $prefix = Config::item('DB','PREFIX');
        $this -> tablename = $prefix."admin";
    }

    function loginValidation($username , $passwd){
        $sql = "select passwd,truename,id from $this->tablename where admin = '$username'";
        $result = $this -> db -> query($sql) -> row_array();
        if(md5($passwd) == $result['passwd']){
            return $result;
        }
        return FALSE;
    }

}
