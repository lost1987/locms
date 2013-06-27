<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-6
 * Time: 下午3:10
 * To change this template use File | Settings | File Templates.
 */
if( ! defined('BASEPATH')) exit('No direct script access allowed');
class InputFilter
{

    function input()
    {
        if (!get_magic_quotes_gpc()) {
            $_REQUEST = daddslashes($_REQUEST);
            $_GET = daddslashes($_GET);
            $_POST = daddslashes($_POST);
            $_COOKIE = daddslashes($_COOKIE);
            $_FILES = daddslashes($_FILES);
        }
    }


    public function post($k = '')
    {
        $post  = $_POST;
        if (!empty($k)) {
            if(!isset($post[$k]) || (empty($post[$k]) && $post[$k] != 0))return '';
            if(is_array($post[$k]))$post[$k] = implode(',',$post[$k]);//针对checkbox做处理
            $post[$k] = inputFilter($post[$k]);
            return $post[$k];
        }
        foreach ($post as $k => $v) {
            if(is_array($v))$v = implode(',',$v);//针对checkbox做处理
            $post[$k] = inputFilter($v);
        }
        return $post;
    }


    public function get($k = '')
    {
        $get = $_GET;
        if (!empty($k)) {
            if(!isset($get[$k]) || (empty($get[$k]) && $get[$k] != 0))return '';
            $get[$k] = inputFilter($get[$k]);
            return $get[$k];
        }
        foreach ($get as $k => $v) {
            $get[$k] = inputFilter($v);
        }
        return $get;
    }

    public function  req($k = '')
    {
        $req =  $_REQUEST;
        if (!empty($k)) {
            if(!isset($req[$k]) || (empty($req[$k]) && $req[$k]))return '';
            if(is_array($req[$k]))$req[$k] = implode(',',$req[$k]);//针对checkbox做处理
            $req[$k] = inputFilter($req[$k]);
            return $req[$k];
        }
        foreach ($req as $k => $v) {
            if(is_array($v))$v = implode(',',$v);//针对checkbox做处理
            $req[$k] = inputFilter($v);
        }
        return $req;
    }


}
