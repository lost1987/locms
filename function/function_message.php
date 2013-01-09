<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-9
 * Time: 上午10:57
 * To change this template use File | Settings | File Templates.
 */

function dwz_success($msg='操作成功',$callbackUrl=''){
    if(empty($callbackUrl))
    die( json_encode(array('statusCode'=>'200', 'message'=>$msg, 'callbackType'=>'forward','callbackUrl' => $callbackUrl)) );
    else
    die( json_encode(array('statusCode'=>'200', 'message'=>$msg)) );
}

function dwz_failed($msg='操作失败',$callbackUrl=''){
    if(empty($callbackUrl))
        die( json_encode(array('statusCode'=>'300', 'message'=>$msg, 'callbackType'=>'forward','callbackUrl' => $callbackUrl)) );
    else
        die( json_encode(array('statusCode'=>'300', 'message'=>$msg)) );
}
?>