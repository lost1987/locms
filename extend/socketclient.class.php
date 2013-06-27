<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-6-24
 * Time: 下午1:53
 * To change this template use File | Settings | File Templates.
 * example
$sc = SocketClient::getInstance();
$sc->connect('127.0.0.1',8009,SocketClient::_AF_INET,SocketClient::_SOCK_STREAM,SocketClient::_TCP,0);
$sc->set_message_len();
$sc->send_server_msg('fuck');
$result = $sc->getResult();
echo $result;
 */
final class SocketClient extends SocketBase
{

    protected  $msg_len;
    protected  $result;

    static $socketClient;

    private  function __construct(){}

    public static function getInstance(){
        if(is_null(self::$socketClient)){
            self::$socketClient = new SocketClient();
        }
        return self::$socketClient;
    }

    private function initProperties($host,$port,$protocol,$type,$common_protocol,$timeout=60){
        set_time_limit($timeout);
        $this -> host = $host;
        $this -> port = $port;
        $this -> common_protocol = $common_protocol;
        $this -> type = $type;
        $this -> protocol = $protocol;
        $this -> timeout = $timeout;
    }

    public function set_message_len($msg_len=1024){
        $this->msg_len = $msg_len;
    }

    public function connect($host,$port,$protocol,$type,$common_protocol,$timeout){
            $common_protocol = getprotobyname($common_protocol);
            $this -> initProperties($host,$port,$protocol,$type,$common_protocol,$timeout);
            $this -> socket = socket_create($protocol,$type,$common_protocol);
            socket_connect($this->socket,$host,$port);
    }

    public function send_server_msg($msg){
        socket_write($this->socket,$msg,strlen($msg));
        while($rev = socket_read($this->socket,$this->msg_len)){
                if($rev !== FALSE){
                    $this->result = $rev;
                    break;
                }
        }
        socket_close($this->socket);
    }

    public function getResult(){
        return $this->result;
    }

}
