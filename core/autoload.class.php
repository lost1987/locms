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

        $className = lcfirst($className);

        $classpath = BASEPATH.'core/'.$className.self::SUBFIX;

        if(file_exists($classpath)){
            require_once $classpath;
        }

        $classpath = BASEPATH.'extend/'.$className.self::SUBFIX;

        if(file_exists($classpath)){
            require_once $classpath;
        }

        $classpath =   BASEPATH.PHP_DIRECTORY.'/c/'.$className.self::SUBFIX;

        if(file_exists($classpath)){
            require_once $classpath;
        }

        $classpath =  BASEPATH.PHP_DIRECTORY.'/m/'.$className.self::SUBFIX;

        if(file_exists($classpath)){
            require_once $classpath;
        }


        //判断c目录下和m录下是否有子目录中的类
        $c_children_dirname = fetch_children_dir(BASEPATH.PHP_DIRECTORY.'/c/');
        foreach($c_children_dirname as $dirname){
            $classpath = BASEPATH.PHP_DIRECTORY.'/c/'.$dirname.'/'.$className.self::SUBFIX;
            if(file_exists($classpath)){
                require_once $classpath;
                break;
            }
        }

        $m_children_dirname = fetch_children_dir(BASEPATH.PHP_DIRECTORY.'/m/');
        foreach($m_children_dirname as $dirname){
            $classpath = BASEPATH.PHP_DIRECTORY.'/m/'.$dirname.'/'.$className.self::SUBFIX;
            if(file_exists($classpath)){
                require_once $classpath;
                break;
            }
        }

    }

}
