<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-6-21
 * Time: 上午10:35
 * To change this template use File | Settings | File Templates.
 * 服务器推 需配合客户端javascript
 */
class LongPolling
{

    private static $callback_success;
    private static $callback_failed;
    private static $fetchMsg;
    const SUCCESS_FETCH_MSG = 'success_fetch_msg';
    const NO_MSG = 'no_msg';

    private static $config = array(
        'times' => 60,
        'usleep' => 3000000
    );

    private function __construct(){}

    /**
     * @param $callback_success  polling成功取得消息 并处理完毕 返回数据的方法,需要单独实现
     * @param $callback_failed   polling没有获得消息 返回数据的方法,需要单独实现
     * @param $fetchMsg  查询是否有消息的方法 ,需要单独实现
     * 格式如 $callback:  array(实例,方法名);
     *       $fetchMsg:  array(实例,方法名);
     */
    public static function registerFunc($callback_success,$callback_failed,$fetchMsg){
        self::$callback_success = $callback_success;
        self::$callback_failed = $callback_failed;
        self::$fetchMsg = $fetchMsg;
    }

    public static function setConfig(Array $config){
            self::$config = array_merge(self::$config,$config);
    }

    //开始服务器推
    public static function run_polling(){
        for($i = 0 ; $i < self::$config['times'] ; $i++){
              $msg =  call_user_func(self::$fetchMsg);
              if($msg == self::SUCCESS_FETCH_MSG){
                  call_user_func(self::$callback);
                  exit;
              }
        }
        usleep(self::$config['usleep']);
        call_user_func(self::$callback_failed);
    }

}
