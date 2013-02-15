<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-2-7
 * Time: 下午8:47
 * To change this template use File | Settings | File Templates.
 * 前后台公共入口
 */
if( ! defined('BASEPATH')) exit('No direct script access allowed');

require BASEPATH.'function/function_core.php';
require BASEPATH.'function/function_message.php';
require BASEPATH.'core/factory.class.php';
require BASEPATH.'core/db_engine.class.php';
require BASEPATH.'core/autoload.class.php';
require BASEPATH . 'core/smarty/Smarty.class.php';

$tpl = new Tpl();
$tpl->template_dir = BASEPATH.ADMIN_DIRECTORY."/templates/";
$tpl->compile_dir = BASEPATH.ADMIN_DIRECTORY."/templates_c/";
$tpl->config_dir = BASEPATH.ADMIN_DIRECTORY."/configs/";
$tpl->cache_dir = BASEPATH.ADMIN_DIRECTORY."/cache/";
//$tpl->cache_lifetime = 60 * 60 * 24;      //设置缓存时间
$tpl->left_delimiter = '<!@{';
$tpl->caching        = false;             //这里是调试时设为false,发布时请使用true

$tpl->right_delimiter = '}@>';
$tpl->compile_check = true;
$tpl->debugging = false;

spl_autoload_register(array('Autoload','_autoload'));

global $settings;
if(get_magic_quotes_runtime()){
    $settings = unserialize(stripslashes(file_get_contents(BASEPATH.'site.inc.php')));
}else{
    $settings = unserialize(file_get_contents(BASEPATH.'site.inc.php'));
}

$pathinfo = new Pathinfo(); //初始化url path类

$entrance = $pathinfo -> entrance;//通过pathinfo类得到程序的入口文件名

$db_engine = Config::item('DB','ENGINE');

$db = DB_ENGINE::init($db_engine);  //初始化DB类

$cookie = new Cookie();//初始化cookie类

$input = new Input();//初始化输入类

$permission = new Permission();//初始化权限类

$globals = array($pathinfo,$db,$tpl,$cookie,$input,$permission);

//注册供模板调用的smarty 自定义函数
require BASEPATH.'function/function_smarty.php';

//实例化公共工厂类
$f = new Factory($globals);

$controllerClass = $f -> pathinfo -> controller;

Aop::beforeMethod();

$c = new $controllerClass;

if(method_exists($c,$f->pathinfo->method)){
    call_user_func(array($c,$f->pathinfo->method));
}

Aop::afterMethod();
exit;

header("HTTP/1.1 404 Not Found");

?>