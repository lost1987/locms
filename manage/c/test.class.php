<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-2-7
 * Time: 下午9:00
 * To change this template use File | Settings | File Templates.
 */
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends AutoController
{
    function test(){
        $this -> model = new Test_m();
    }


    /*
    function index(){
           //polling test
           LongPolling::registerFunc(array($this,'test1'),array($this,'test1'),array($this,'fetch'));
           LongPolling::run_polling();
    }


    function test1(){
        echo '1';
    }

    function fetch(){
        return LongPolling::NO_MSG;
    }
*/
}
