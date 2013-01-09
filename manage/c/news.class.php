<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-7
 * Time: 上午9:12
 * To change this template use File | Settings | File Templates.
 */
if( ! defined('BASEPATH')) exit('No direct script access allowed');
class News extends Core implements Action
{

    function News(){
         check_login();
         $this -> newsModel = new News_m();
    }

    function index()
    {
        // TODO: Implement index() method.
        $pagecount = 20;
        $pageNum = $this -> input -> post('pageNum');
        if($pageNum == '')$pageNum = 1;
        $start = ($pageNum - 1) * $pagecount;


        $data = array();
        $data['list'] = $this -> newsModel -> lists($start,$pagecount);
        $data['totalCount'] = $this -> newsModel -> num_rows();
        $data['numPerPage'] = $pagecount;
        $data['currentPage'] = $pageNum;

        $this -> tpl -> display("news_list.html");
    }

    function save()
    {
        // TODO: Implement save() method.
        $id = $this -> input -> post('id');
        if(empty($id)){
            $post = $this -> input -> post();
            unset($post['id']);
            unset($post['fg']);
            if($this -> newsModel -> insert($post)){
                die( json_encode(array('statusCode'=>'200', 'message'=>'操作成功', 'callbackType'=>'forward')) );
            }

        }else{

        }
        die( json_encode(array('statusCode'=>'300', 'message'=>'操作失败')) );
    }

    function edit()
    {
        // TODO: Implement edit() method.
        $id = $this -> input -> get('id');


        $this -> tpl -> assign('dest','add');
        $this -> tpl -> assign('title','');
        $this -> tpl -> assign('shorttitle','');
        $this -> tpl -> assign('flag','');
        $this -> tpl -> assign('writer','');
        $this -> tpl -> assign('source','');
        $this -> tpl -> assign('litpic','');
        $this -> tpl -> assign('keywords','');
        $this -> tpl -> assign('description','');
        $this -> tpl -> assign('content','');

        if(empty($id)){
            $this -> tpl -> display('news_add.html');
        }else{

        }

    }

    function del()
    {
        // TODO: Implement del() method.
    }

}
