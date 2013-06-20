<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-5
 * Time: 上午10:59
 * To change this template use File | Settings | File Templates.
 */
if( ! defined('BASEPATH')) exit('No direct script access allowed');

define('APPNAME','');

define('HOST','http://dev.locms.com/');

define('WEBROOT',(APPNAME=='') ? HOST : HOST.APPNAME.DIRECTORY_SEPARATOR);

define('COOKIE_TIMEOUT',7200);

define('COOKIE_SECRECT','abracadabra');

define('COOKIE_DOMAIN','/');

define('MEMCACHE_HOST','');

define('MEMCACHE_PORT','');

?>