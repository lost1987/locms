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
//前台文件存放的文件夹名
define('PHP_DIRECTORY','application');
define('WEB_DEBUG',TRUE);

if(WEB_DEBUG)error_reporting(E_ALL);
else error_reporting(0);

require BASEPATH.'conf/config.inc.php';
require BASEPATH . PHP_DIRECTORY .'/conf/config.php';
require BASEPATH . PHP_DIRECTORY .'/conf/config.aop.php';
require BASEPATH . 'core/publish.php';

?>
