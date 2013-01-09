<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-5
 * Time: 上午11:49
 * To change this template use File | Settings | File Templates.
 */

if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pathinfo
{

    public $controller;

    public $method;

    public $entrance;

    function Pathinfo($symbol){
        $this -> init($symbol);
    }

    /**
     * @param $symbol 前台还是后台
     * ac = 后台
     * op = 前台
     */
    private function init($symbol){

        $request_uri = $_SERVER['REQUEST_URI'];

        $request_uri = preg_replace('/(.*)(\/|(\?.*))$/','$1',$request_uri);//去除url后面最后的斜杠和？后面的参数

        if(APPNAME != ''){
            $request_uri = str_replace('/'.APPNAME,'',$request_uri);
        }

        $params = explode('/',$request_uri);

        if(count($params) == 1){
            $this -> entrance = 'index.php';
            $this -> controller = Config::item($symbol,'default');
            $this -> method = Config::item($symbol,'default_method');
        }

        else if(count($params) == 2){
               list(,$this -> entrance) = $params;
               $this -> controller = Config::item($symbol,'default');
               $this -> method = Config::item($symbol,'default_method');
        }

        else if(count($params) == 3){
               list(,$this -> entrance , $this ->controller) = $params;
               $this -> method = Config::item($symbol,'default_method');
        }

        else{
            list(,$this -> entrance, $this -> controller , $this -> method) =  $params;
        }

    }

}

?>