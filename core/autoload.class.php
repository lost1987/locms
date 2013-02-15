<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-2-9
 * Time: 下午7:15
 * To change this template use File | Settings | File Templates.
 */
if( ! defined('BASEPATH')) exit('No direct script access allowed');
abstract class Autoload
{
    const SUBFIX = '.class.php';


    public static function _autoload($className){

        $className = strtolower($className);

        $classpath = BASEPATH.'core/'.$className.self::SUBFIX;

        if(file_exists($classpath)){
            require_once $classpath;
        }

        $classpath = BASEPATH.'extend/'.$className.self::SUBFIX;

        if(file_exists($classpath)){
            require_once $classpath;
        }

        if(defined('ADMIN_DIRECTORY')){

                $classpath = BASEPATH.ADMIN_DIRECTORY.'/c/'.$className.self::SUBFIX;

                if(file_exists($classpath)){
                    require_once $classpath;
                }

                $classpath = BASEPATH.ADMIN_DIRECTORY.'/m/'.$className.self::SUBFIX;

                if(file_exists($classpath)){
                    require_once $classpath;
                }

        }

        if(defined('NORMAL_DIRECTORY')){

                $classpath = BASEPATH.NORMAL_DIRECTORY.'/m/'.$className.self::SUBFIX;

                if(file_exists($classpath)){
                    require_once $classpath;
                }

                $classpath = BASEPATH.NORMAL_DIRECTORY.'/c/'.$className.self::SUBFIX;

                if(file_exists($classpath)){
                    require_once $classpath;
                }

        }
    }
}
