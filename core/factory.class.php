<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-5
 * Time: 下午12:42
 * To change this template use File | Settings | File Templates.
 */

if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Factory
{
    function factory($classes){
        $this -> init_properties($classes);
    }

    /**
     * @param $classes array 需要被全局使用的类实体数组
     */
    private function init_properties($classes){
        foreach($classes as $class_instance){
            $className = get_class($class_instance);
            $this -> {strtolower($className)} = $class_instance;
        }
    }


}


