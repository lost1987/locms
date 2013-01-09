<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-6
 * Time: 下午3:10
 * To change this template use File | Settings | File Templates.
 */
if( ! defined('BASEPATH')) exit('No direct script access allowed');
class Input
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
            if(empty($post[$k]))return '';
            $post[$k] = inputFilter($post[$k]);
            return $post[$k];
        }
        foreach ($post as $k => $v) {
            $post[$k] = inputFilter($v);
        }
        return $post;
    }


    public function get($k = '')
    {
        $get = $_GET;
        if (!empty($k)) {
            if(empty($get[$k]))return '';
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
            if(empty($req[$k]))return '';
            $req[$k] = inputFilter($req[$k]);
            return $req[$k];
        }
        foreach ($req as $k => $v) {
            $req[$k] = inputFilter($v);
        }
        return $req;
    }


}
