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
         $this -> permission -> checkPermssion($this->cookie->userdata('permission'),$this->permission->getPermissions('CONTENT'));
         $this -> newsModel = new News_m();
         $this -> arcModel = new Arctype_m();
    }

    function index()
    {
        // TODO: Implement index() method.
        $pagecount = 20;
        $pageNum = $this -> input -> post('pageNum');
        if($pageNum == '')$pageNum = 1;
        $start = ($pageNum - 1) * $pagecount;


        $list = $this -> newsModel -> lists($start,$pagecount);
        $page['totalCount'] = $this -> newsModel -> num_rows();
        $page['numPerPage'] = $pagecount;
        $page['currentPage'] = $pageNum;

        global $settings;
        $this -> tpl -> assign('static_on',$settings['static']);
        $this -> tpl -> assign('list',$list);
        $this -> tpl -> assign('page',$page);
        $this -> tpl -> display("news_list.html");
    }

    function save()
    {
        // TODO: Implement save() method.
        $id = $this -> input -> post('id');
        $post = $this -> input -> post();
        unset($post['id']);
        unset($post['fg']);
        $post['content'] = $_POST['content'];

        if(empty($id)){
            if($this -> newsModel -> insert($post)){
                dwz_success();
            }
        }else{
            if($this -> newsModel -> update($post,$id)){
                dwz_success();
            }
        }
        dwz_failed();
    }

    function edit()
    {
        // TODO: Implement edit() method.
        $id = $this -> input -> get('id');

        //读取栏目
        $arctypes = $this -> arcModel -> no_root();
        $this -> tpl -> assign('flag','flag_a');

        if(!empty($id)){
            $article = $this -> newsModel -> read($id);
            $this -> tpl -> assign('article',$article);
            $this -> tpl -> assign('flag','flag_e');
        }

        $this -> tpl -> assign('arctypes',$arctypes);
        $this -> tpl -> display('news_add.html');
    }

    function del()
    {
        // TODO: Implement del() method.
        $id = $this -> input -> req('id');
        if($this -> newsModel -> del($id)){
            dwz_success('操作成功',site_url('news'));
        }
        dwz_failed();
    }

    function make_article(){
        $id = $this -> input -> post('id');
        $s = new Cstatics($this->tpl,$this->db);
        $s -> makeArticle($id);
        echo 0;
    }

}
