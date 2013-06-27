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
        $pagecount = 20;
        $pageNum = $this -> input -> post('pageNum');
        if($pageNum == '')$pageNum = 1;
        $start = ($pageNum - 1) * $pagecount;

        //search
        $post = $this -> input -> post();
        if(!empty($pageNum))unset($post['pageNum']);
        $this -> set_search_fields_value($post);
        $this -> model -> setCondition($post);

        $list = $this -> model -> lists($start,$pagecount);
        $page['totalCount'] = $this -> model -> num_rows();
        $page['numPerPage'] = $pagecount;
        $page['currentPage'] = $pageNum;

        $this -> html_special_value_transfer($list);
        $this -> tpl -> assign('autoform',$this -> autoform);
        $this -> tpl -> assign('list',$list);
        $this -> tpl -> assign('page',$page);
        $this -> tpl -> display("auto/list.html");
    }

    function save(){
           $id = $this -> input -> post('id');
           $post = $this -> input -> post();
           unset($post['id']);
           $this->fields_transfer($post);

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
        $id = $this -> input -> post('ids');
        if($this -> model -> del($id))dwz_success('操作成功',strtolower($this->pathinfo->controller));
        dwz_failed();
    }

    /**
     * 改变结果集,将checkbox,select,radio,的值转换为key显示给用户,datepicker的值转化为日期格式
     * @param $list  数据库查询出来返回的数组
     */
    function html_special_value_transfer(&$list){
        foreach($list as &$item){
            foreach($this->autoform->fields as $field){

                if($field['form_field_type'] == 'datepicker') $item[$field['Field']] = date('Y-m-d H:i:s',$item[$field['Field']] );

                if(!empty($field['datasource']) || !empty($field['refer'])){
                    switch($field['form_field_type']){
                        case 'combox':
                            if(!empty($field['refer'])){//以表关联形式出现
                                list($ref_tableName,$columnKey,$columnValue) = explode('.',$field['refer']);
                                $ref_tableName = Config::item('DB','PREFIX').$ref_tableName;
                                $sql = "select $columnKey,$columnValue from $ref_tableName ";
                                if(!empty($field['cond']))$sql.= $field['cond'];
                                $dataCollection = $this -> db -> query($sql) -> result_array();
                                foreach($dataCollection as $data){
                                    if($item[$field['Field']] == $data[$columnValue]){
                                        $item[$field['Field']] = $data[$columnKey];
                                        break;
                                    }
                                }
                            }else{//以固定值形式出现
                                $dataCollection = explode(',',$field['datasource']);
                                foreach($dataCollection as $data){
                                    list($columnKey,$columnValue) = explode('.',$data);
                                    if($item[$field['Field']] == $columnValue){
                                        $item[$field['Field']] = $columnKey;
                                        break;
                                    }
                                }
                            }
                            break;
                        case 'radio' :
                            if(!empty($field['refer'])){//以表关联形式出现
                                list($ref_tableName,$columnKey,$columnValue) = explode('.',$field['refer']);
                                $ref_tableName = Config::item('DB','PREFIX').$ref_tableName;
                                $sql = "select $columnKey,$columnValue from $ref_tableName ";
                                if(!empty($field['cond']))$sql.= $field['cond'];
                                $dataCollection = $this -> db -> query($sql) -> result_array();
                                foreach($dataCollection as $data){
                                    if($item[$field['Field']] == $data[$columnValue]){
                                        $item[$field['Field']] = $data[$columnKey];
                                        break;
                                    }
                                }
                            }else{//以固定值形式出现
                                $dataCollection = explode(',',$field['datasource']);
                                foreach($dataCollection as $data){
                                    list($columnKey,$columnValue) = explode('.',$data);
                                    if($item[$field['Field']] == $columnValue){
                                        $item[$field['Field']] = $columnKey;
                                        break;
                                    }
                                }
                            }
                            break;

                        case 'checkbox' :
                            if(!empty($field['refer'])){//以表关联形式出现
                                list($ref_tableName,$columnKey,$columnValue) = explode('.',$field['refer']);
                                $ref_tableName = Config::item('DB','PREFIX').$ref_tableName;
                                $sql = "select $columnKey,$columnValue from $ref_tableName ";
                                if(!empty($field['cond']))$sql.= $field['cond'];
                                $dataCollection = $this -> db -> query($sql) -> result_array();
                                $values = explode(',',$item[$field['Field']]);
                                $item[$field['Field']] = '';
                                foreach($dataCollection as $data){
                                    foreach($values as $value){
                                        if($value == $data[$columnValue]){
                                            $item[$field['Field']] .= $data[$columnKey].',';
                                            break;
                                        }
                                    }
                                }
                            }else{//以固定值形式出现
                                $dataCollection = explode(',',$field['datasource']);
                                $values = explode(',',$item[$field['Field']]);
                                $item[$field['Field']] = '';
                                foreach($dataCollection as $data){
                                    list($columnKey,$columnValue) = explode('.',$data);
                                    foreach($values as $value){
                                        if($value == $columnValue){
                                            $item[$field['Field']] .= $columnKey.',';
                                            break;
                                        }
                                    }
                                }
                            }
                            break;
                    }
                }
            }
        }
    }

    /**
     * 将表单搜索post过来的值 与 autoform的fields字段合并,如果key相等 则把值赋予fields的value属性 并设置model中查询需要重组的post字段数组 datepicker的值转化为日期格式
     * @param $post
     */
    function set_search_fields_value(&$post){
        $newpost = array();
        if(!$post)return $newpost;
        foreach($this->autoform->fields as &$field){
              if(array_key_exists($field['Field'],$post)){
                  $field['value'] = $post[$field['Field']];
                  $newpost[$field['Field']]['form_field_type'] = $field['form_field_type'];//将字段的表单元素类型赋予post 用于判断model中查询条件的符号是等号还是like
                  if($field['form_field_type'] == 'datepicker')$newpost[$field['Field']]['value'] = strtotime(str_replace('&nbsp;','',$post[$field['Field']]));
                  else $newpost[$field['Field']]['value'] = $post[$field['Field']];
              }
        }
        $post = $newpost;
    }


    /**
     * 将save或edit post过来的值 进行转化 如日期类型 存储为int
     * @param $post
     */
    function fields_transfer(&$post){
        foreach($this -> autoform -> fields as $field){
            if($field['form_field_type'] == 'datepicker'){
                $post[$field['Field']] = strtotime(str_replace('&nbsp;','',$post[$field['Field']]));
            }
        }
    }

}
