<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-5-3
 * Time: 下午2:05
 * To change this template use File | Settings | File Templates.
 */
class Album extends AutoController
{

    function Album(){
        $this -> model = new Album_m();
    }

}
