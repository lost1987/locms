<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-5
 * Time: 下午10:50
 * To change this template use File | Settings | File Templates.
 * 存放供页面调用的smarty 函数
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

$tpl->registerPlugin('function','Smarty_site_url','smarty_site_url');
$tpl->registerPlugin('function','Smarty_cookie_decode','smarty_cookie_decode');

function smarty_site_url($params){
    global $entrance;
    if(empty($params['action_method'])){
        echo WEBROOT;
    }else{
        echo WEBROOT.$entrance.'/'.$params['action_method'];
    }
}

function smarty_cookie_decode($params){
    global $f;
    $key = $params['key'];
    echo $f -> cookie -> userdata($key);
}

?>