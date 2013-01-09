<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-5
 * Time: 上午10:59
 * To change this template use File | Settings | File Templates.
 */
if( ! defined('BASEPATH')) exit('No direct script access allowed');

define('APPNAME','locms');

define('HOST','http://localhost/');

//后台文件存放的文件夹名
define('ADMIN_DIRECTORY','manage');

//前台文件存放的文件夹名
define('NORMAL_DIRECTORY','application');

define('WEB_DEBUG',TRUE);

define('WEBROOT',HOST.APPNAME.DIRECTORY_SEPARATOR);

?>