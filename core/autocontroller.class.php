<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-2-7
 * Time: 下午4:50
 * To change this template use File | Settings | File Templates.
 * 智能表单模板类
 */
if( ! defined('BASEPATH')) exit('No direct script access allowed');

abstract class AutoController extends Core
{

    protected $model;

    function index(){
        $id = $this -> input -> get('id');

        if(!empty($id)){

        }

        $this -> tpl -> assign('autoform',$this -> autoform);
        $this -> tpl -> display('auto/edit.html');
    }

    function save(){
           $id = $this -> input -> post('id');
           $post = $this -> input -> post();
           unset($post['id']);

           if(!empty($id)){
                if($this-> model-> update($post,"id=$id")){
                    dwz_success();
                }
           }

           if($this -> model -> insert($post)){
               dwz_success();
           }
           dwz_failed();
    }

    function edit(){
        $id = $this -> input -> get('id');

        if(!empty($id)){
            $this->tpl -> assign('id',$id);
        }

        $this -> tpl -> assign('autoform',$this -> autoform);
        $this -> tpl -> display('auto/edit.html');
    }

    function del(){

    }
}
