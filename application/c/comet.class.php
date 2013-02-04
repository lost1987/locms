<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-2-1
 * Time: 上午9:24
 * To change this template use File | Settings | File Templates.
 */
class Comet extends Core
{
    public function main(){
        set_time_limit(0);
        $timeout = intval($this -> input -> post('timeout'))/1000;
        $start = time();
        while(1){

            $end = time();
         /*   if($end - $start > $timeout){
                break;
            }*/
            if($end-$start>5){
                echo 'success';
                break;
            }

        }
        echo '';
    }
}
