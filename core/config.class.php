<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-5
 * Time: 上午11:44
 * To change this template use File | Settings | File Templates.
 */
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config
{

    public static function item($key,$tw_key = ''){

        require BASEPATH.'config.php';

        if(empty($tw_key)){
            return $config[$key];
        }

        return $config[$key][$tw_key];

    }

}
