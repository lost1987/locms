<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['DB']['HOST'] = '127.0.0.1';
$config['DB']['USERNAME'] = 'root';
$config['DB']['PASSWORD'] = '';
$config['DB']['DEBUG'] = TRUE;
$config['DB']['DBNAME'] = 'locms';
$config['DB']['PREFIX'] = 'lo_';

//后台控制器配置
$config['ac']['default'] = 'login';
$config['ac']['default_method'] = 'index';

//前台控制器配置
$config['op']['default'] = 'index';
$config['op']['default_method'] = 'main';
?>