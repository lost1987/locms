<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-31
 * Time: 下午4:37
 * To change this template use File | Settings | File Templates.
 * //数据库引擎选择
 */
if( ! defined('BASEPATH')) exit('No direct script access allowed');
class DB_ENGINE
{

     public static function init($db_engine){
            $db_engine = ucfirst($db_engine);
            if(class_exists($db_engine)){
                eval("class DB extends $db_engine{}");
                return new DB();
            }

            die('数据库设置错误,请检查数据类引擎');

     }

}
