<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-7
 * Time: 下午5:24
 * To change this template use File | Settings | File Templates.
 */
class Arctype_m extends Core implements CRUD
{

    function Arctype_m(){
        $prefix = Config::item('DB','PREFIX');
        $this -> tableName = $prefix.'arctype';
        $this -> table_article = $prefix.'article';
    }

    function lists($start, $pagecount)
    {
        // TODO: Implement lists() method.
        return $this -> db -> query("select * from $this->tableName order by id desc limit $start,$pagecount")->result_array();
    }

    function insert($array)
    {
        // TODO: Implement insert() method.
        if($this -> db -> insert($this->tableName,$array)){
            return TRUE;
        }
        return FALSE;
    }

    function update($array,$condition)
    {
        // TODO: Implement update() method.
        if($this -> db -> update($this->tableName,$array,$condition)){
            return TRUE;
        }
        return FALSE;
    }

    function del($id)
    {
        //判断栏目下是否有文章 如果有不能删除，如果是根栏目且有子栏目也不能删除
        $this -> db -> query("select id from $this->table_article where typeid = $id limit 0,1");
        $articlecount = $this -> db -> num_rows();
        if($articlecount > 0)return FALSE;

        $this -> db -> query("select id from $this->tableName where reid = $id");
        $childTypecount = $this -> db -> num_rows();
        if($childTypecount > 0)return FALSE;

        // TODO: Implement del() method.
        $this -> db -> query("delete from $this->tableName where id = $id");
        if($this -> db -> queryState){
            return TRUE;
        }
        return FALSE;
    }

    function read($id){
        return  $this -> db -> query("select * from $this->tableName where id = $id") -> row_array();
    }

    function num_rows()
    {
        // TODO: Implement num_rows() method.
        return  $this -> db -> query("select id from $this->tableName") -> num_rows();
    }

    //读取所有根栏目
    function root(){
        return $this -> db -> query("select id,typename from $this->tableName where reid = 0") -> result_array();
    }

    //读取所有根栏目和子栏目 并且按顺序排列
    function  rootdetail(){
        $roots  = $this -> db -> query("select * from $this->tableName where reid = 0") -> result_array();
        foreach($roots as &$root){
            $pid = $root['id'];
            $temptypes = $this -> db -> query("select * from $this->tableName where reid = $pid") -> result_array();
            $root['children'] = $temptypes;
        }
        return  $roots;
    }

    //判断是否是根栏目
    function is_root($id){
        $result = $this -> db -> query("select reid from $this->tableName where id = $id") -> row_array();
        if($result['reid'] == 0){
            return TRUE;
        }
        return FALSE;
    }

}
