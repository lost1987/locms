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
    function __get($property){
        global $f;
        return $f->{strtolower($property)};
    }

    function &getFactory(){
        global $f;
        return $f;
    }
}

?>