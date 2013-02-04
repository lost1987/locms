<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-5
 * Time: 上午11:09
 * To change this template use File | Settings | File Templates.
 */

if( ! defined('BASEPATH')) exit('No direct script access allowed');

abstract class Core
{

    const SUBFIX = '.class.php';


    public static function autoload($className){

        $className = strtolower($className);

        $classpath = BASEPATH.'core/'.$className.self::SUBFIX;

        if(file_exists($classpath)){
            require_once $classpath;
        }

        $classpath = BASEPATH.'extend/'.$className.self::SUBFIX;

        if(file_exists($classpath)){
            require_once $classpath;
        }

        $classpath = BASEPATH.ADMIN_DIRECTORY.'/c/'.$className.self::SUBFIX;

        if(file_exists($classpath)){
            require_once $classpath;
        }

        $classpath = BASEPATH.ADMIN_DIRECTORY.'/m/'.$className.self::SUBFIX;

        if(file_exists($classpath)){
            require_once $classpath;
        }

        $classpath = BASEPATH.NORMAL_DIRECTORY.'/m/'.$className.self::SUBFIX;

        if(file_exists($classpath)){
            require_once $classpath;
        }

        $classpath = BASEPATH.NORMAL_DIRECTORY.'/c/'.$className.self::SUBFIX;

        if(file_exists($classpath)){
            require_once $classpath;
        }
    }

    function __get($property){
        global $f;
        return $f->{strtolower($property)};
    }

}

?>