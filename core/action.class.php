<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-5
 * Time: 下午6:02
 * To change this template use File | Settings | File Templates.
 */
if( ! defined('BASEPATH')) exit('No direct script access allowed');
interface Action
{
   function index();
   function save();
   function edit();
   function del();
}
