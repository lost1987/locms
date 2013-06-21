<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-10
 * Time: 下午2:56
 * To change this template use File | Settings | File Templates.
 */
class Index extends  Core
{

    public function main(){
        $this -> tpl -> display('index.html');
    }

    public function comet(){
        $this -> tpl -> display('comet.html');
    }

}
