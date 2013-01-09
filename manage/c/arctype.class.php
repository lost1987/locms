<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-7
 * Time: 下午4:55
 * To change this template use File | Settings | File Templates.
 */
class Arctype extends Core implements Action
{

    function arctype(){
        check_login();
        $this -> arcModel = new Arctype_m();
    }

    function index()
    {
        // TODO: Implement index() method.
        // TODO: Implement index() method.
        $pagecount = 1000;
        $pageNum = $this -> input -> post('pageNum');
        if($pageNum == '')$pageNum = 1;
        $start = ($pageNum - 1) * $pagecount;


        $data = array();
        $list = $this -> arcModel -> rootdetail();
        $totalCount = $this -> arcModel -> num_rows();
        $numPerPage = $pagecount;
        $currentPage = $pageNum;

        $this -> tpl -> assign('list',$list);
        $this -> tpl -> assign('totalCount',$totalCount);
        $this -> tpl -> assign('numPerPage',$numPerPage);
        $this -> tpl -> assign('currentPage',$currentPage);
        $this -> tpl -> display("arctype_list.html");
    }

    function save()
    {
        // TODO: Implement save() method.
        $post = $this -> input -> post();
        $post['templist'] = 'list';
        $post['temparticle'] = 'article';
        $id = $post['id'];
        unset($post['id']);

        if(empty($id)){
            if($this -> arcModel -> insert($post)){
                die( json_encode(array('statusCode'=>'200', 'message'=>'操作成功', 'callbackType'=>'forward')) );
            }
            die( json_encode(array('statusCode'=>'300', 'message'=>'操作失败')) );
        }else{
            if($this -> arcModel -> update($post,"id=$id")){
                die( json_encode(array('statusCode'=>'200', 'message'=>'操作成功', 'callbackType'=>'forward','forwardUrl' => site_url('arctype'))) );
            }
            die( json_encode(array('statusCode'=>'300', 'message'=>'操作失败')) );
        }
    }

    function edit()
    {
        // TODO: Implement edit() method.
        $id = $this -> input -> get('id');

        $this -> tpl -> assign('dest','add');


        $arctype = array(
            'id' => '',
            'typename' => '',
            'typedir'  => '',
            'templist' => '',
            'temparticle' => '',
            'description' => '',
            'keywords' => ''
        );

        //读取根栏目
        $types = $this -> arcModel -> root();
        $typelist = array(array('id' => '0' , 'typename' => '根栏目'));
        foreach($types as $t){
            $typelist[] = $t;
        }
        $this -> tpl -> assign('typelist',$typelist);

        if(!empty($id)){
            $arctype  =  $this -> arcModel -> read($id);
            $this -> tpl -> assign('dest','update');

            $arctype = array(
                'id' => $arctype['id'],
                'reid'=>$arctype['reid'],
                'typename' => $arctype['typename'],
                'typedir'  => $arctype['typedir'],
                'templist' => $arctype['templist'],
                'temparticle' => $arctype['temparticle'],
                'description' => $arctype['description'],
                'keywords' => $arctype['keywords']
            );
        }

        $this -> tpl -> assign('arctype',$arctype);
        $this -> tpl -> display('arctype_add.html');
    }

    function del()
    {
        // TODO: Implement del() method.
        $id = $this -> input -> get('id');
        if($this -> arcModel -> del($id)){
            die( json_encode(array('statusCode'=>'200', 'message'=>'操作成功', 'callbackType'=>'forward','forwardUrl' => site_url('arctype'))) );
        }
        die( json_encode(array('statusCode'=>'300', 'message'=>'操作失败')) );
    }

}
