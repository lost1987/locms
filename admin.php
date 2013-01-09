<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-5
 * Time: 上午10:45
 * To change this template use File | Settings | File Templates.
 */

session_start();

define('BASEPATH',dirname(__FILE__).DIRECTORY_SEPARATOR);

require 'config.inc.php';

if(WEB_DEBUG)error_reporting(E_ALL);
else error_reporting(0);
require BASEPATH.'function/function_core.php';
require BASEPATH.'function/function_message.php';
require BASEPATH.'core/factory.class.php';
require BASEPATH.'core/mysql.class.php';
require BASEPATH.'core/core.class.php';
require BASEPATH . 'extend/smarty/Smarty.class.php';

$tpl = new Tpl();
$tpl->template_dir = BASEPATH.ADMIN_DIRECTORY."/templates/";
$tpl->compile_dir = BASEPATH.ADMIN_DIRECTORY."/templates_c/";
$tpl->config_dir = BASEPATH.ADMIN_DIRECTORY."/configs/";
$tpl->cache_dir = BASEPATH.ADMIN_DIRECTORY."/cache/";
//$tpl->cache_lifetime = 60 * 60 * 24;      //设置缓存时间
$tpl->left_delimiter = '<!@{';$tpl->caching        = false;             //这里是调试时设为false,发布时请使用true

$tpl->right_delimiter = '}@>';
$tpl->compile_check = true;
$tpl->debugging = false;

spl_autoload_register(array('core','autoload'));

$pathinfo = new Pathinfo('ac'); //初始化url path类

$entrance = $pathinfo -> entrance;//通过pathinfo类得到程序的入口文件名

$db = new DB();  //初始化DB类

$cookie = new Cookie();//初始化cookie类

$input = new Input();//初始化输入类

$globals = array($pathinfo,$db,$tpl,$cookie,$input);

//注册供模板调用的smarty 自定义函数
require BASEPATH.'function/function_smarty.php';

//实例化公共工厂类
$f = &new Factory($globals);

$controllerClass = $f -> pathinfo -> controller;
$c = new $controllerClass;


if(method_exists($c,$f->pathinfo->method)){
    call_user_func(array($c,$f->pathinfo->method));
    exit;
}


header("HTTP/1.1 404 Not Found");


?>
