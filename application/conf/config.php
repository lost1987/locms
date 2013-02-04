<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-2-4
 * Time: 上午10:06
 * To change this template use File | Settings | File Templates.
 */
if( ! defined('BASEPATH')) exit('No direct script access allowed');

//前台控制器配置
$config['controller']['default'] = 'index';
$config['controller']['default_method'] = 'main';

$config['DB']['HOST'] = '127.0.0.1';
$config['DB']['USERNAME'] = 'root';
$config['DB']['PASSWORD'] = '';
$config['DB']['DEBUG'] = TRUE;
$config['DB']['DBNAME'] = 'locms';
$config['DB']['PREFIX'] = 'lo_';
$config['DB']['ENGINE'] = 'mysql';


?>