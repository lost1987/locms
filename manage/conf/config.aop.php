<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-2-4
 * Time: 上午9:37
 * To change this template use File | Settings | File Templates.
 *
 * array('checklogin') 方法调用
 * array('user','checkpermission') 类调用
 */
//后台aop
if( ! defined('BASEPATH')) exit('No direct script access allowed');
$aop['before'] = array(
        array('check_login'),
        array('Autoform','init_auto_form')
);

$aop['after'] = array();


