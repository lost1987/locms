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

    public $directory;

    function Pathinfo(){
        $this -> init();
    }


    private function init(){

        $request_uri = $_SERVER['REQUEST_URI'];

        $request_uri = preg_replace('/(.*)(\/|(\?.*))$/','$1',$request_uri);//去除url后面最后的斜杠和？后面的参数

        if(APPNAME != ''){
            $request_uri = str_replace('/'.APPNAME,'',$request_uri);
        }

        $params = explode('/',$request_uri);

        if(count($params) == 1){
            $this -> entrance = 'index.php';
            $this -> controller = Config::item('controller','default');
            $this -> method = Config::item('controller','default_method');
        }

        else if(count($params) == 2){
               list(,$this -> entrance) = $params;
               $this -> controller = Config::item('controller','default');
               $this -> method = Config::item('controller','default_method');
        }

        else if(count($params) == 3){
               list(,$this -> entrance , $this ->controller) = $params;
               $this -> method = Config::item('controller','default_method');
        }

        else if(count($params) == 4){
            list(,$this -> entrance, $this -> controller , $this -> method) =  $params;
            if(!class_exists($this->controller)){//如果控制器或者模型在c或m文件夹里还有文件夹包着 就会进入此逻辑
                list(,$this -> entrance, $this->directory, $this -> controller) =  $params;
                $this -> method = Config::item('controller','default_method');
            }
        }

        else if(count($params) == 5){
            list(,$this -> entrance, $this->directory, $this -> controller , $this -> method) =  $params;
        }

    }

}

?>