<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-2-4
 * Time: 上午9:24
 * To change this template use File | Settings | File Templates.
 */
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aop
{

     public static function beforeMethod(){
        global $aop;
        foreach($aop['before'] as $object){
            if(is_array($object)){

                if(count($object) == 1){//如果是普通方法
                    eval($object[0].'();');
                }else{//如果是类方法
                    list($class,$method) = $object;
                    call_user_func(array(new $class,$method));
                }

            }
        }
     }

     public static function afterMethod(){

     }

}
