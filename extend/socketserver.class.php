<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-6-24
 * Time: 下午1:53
 * To change this template use File | Settings | File Templates.
$ss = SocketServer::getInstance();
$ss -> createSocketServer('127.0.0.1',8009,SocketServer::_AF_INET,SocketServer::_SOCK_STREAM,SocketServer::_TCP,0,1);
$ss -> set_message_len();
$ss -> setMessages('succeed','failed');
$ss -> run();
 */
final class SocketServer extends SocketBase
{

    protected  $accept;
    protected  $connection_count;
    protected  $message_succeed;
    protected  $message_failed;

    static $socketServer;

    private function __construct(){}

    public static function getInstance(){
        if(is_null(self::$socketServer)){
            self::$socketServer = new SocketServer();
        }
        return self::$socketServer;
    }

    private function initProperties($host,$port,$common_protocol,$type,$protocol,$timeout=60,$connection_count=1){
        set_time_limit($timeout);
        $this -> host = $host;
        $this -> port = $port;
        $this -> common_protocol = $common_protocol;
        $this -> type = $type;
        $this -> protocol = $protocol;
        $this -> timeout = $timeout;
        $this -> connection_count = $connection_count;
    }

    /**
     * @param $host
     * @param $port
     * @param $protocol
     * @param $type
     * @param $common_protocol
     * @param $timeout
     * @param $connection_count
     * @return resource
     */
    public function createSocketServer($host,$port,$protocol,$type,$common_protocol,$timeout,$connection_count){
        $common_protocol = getprotobyname($common_protocol);
        $this->initProperties($host,$port,$protocol,$type,$common_protocol,$timeout,$connection_count);
        $this->socket = socket_create($protocol,$type,$common_protocol);
        socket_bind($this->socket,$host,$port);
        socket_listen($this->socket,$this->connection_count);
        return $this->socket;
    }

    public function set_message_len($msg_len=1024){
        $this->msg_len = $msg_len;
    }

    public function setMessages($message_succeed,$message_failed){
        $this->message_succeed = $message_succeed;
        $this->message_failed = $message_failed;
    }


    public function run(){
        while(1){
            $this->accept = socket_accept($this->socket);
            $clientMsg = socket_read($this->accept,$this->msg_len);
            if($clientMsg !== FALSE){
                $this->send_client_msg($this->message_succeed.'\r\n');
                break;
            }
        }
        $this -> close();
    }

    public function send_client_msg($msg){
          socket_write($this->accept,$msg,strlen($msg));
    }

    private function close(){
        socket_close($this->accept);
        socket_close($this->socket);
    }
}
