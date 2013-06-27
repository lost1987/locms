<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-6-24
 * Time: 下午3:49
 * To change this template use File | Settings | File Templates.
 */
abstract class SocketBase
{
    const _AF_INET = AF_INET;
    const _SOCK_STREAM = SOCK_STREAM;
    const _TCP = 'tcp';
    const _UDP = 'udp';

    protected  $host;
    protected  $port;
    protected  $socket;
    protected  $timeout;
    protected  $protocol;
    protected  $common_protocol;
    protected  $type;
}
