<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-2-7
 * Time: 下午4:52
 * To change this template use File | Settings | File Templates.
 * 智能模型模板
 */
if( ! defined('BASEPATH')) exit('No direct script access allowed');

abstract class AutoModel extends Core
{
    function lists($start,$pagecount){
        return $this -> db -> query("select * from $this->autoform->tableName limit $start,$pagecount") -> result_array();
    }

    function read($id){
        return $this -> db -> query("select * from $this->autoform->tableName where id  = $id") -> row_array();
    }

    function insert($array){
        return $this -> db -> insert($this->autoform->tableName,$array);
    }

    function update($array,$condition){
        return $this -> db -> update($this->autoform->tableName,$array,$condition);
    }

    function del($id){
        return $this -> query("delete from $this->autoform->tableName where id in ($id)") -> queryState;
    }

    function num_rows(){
        return $this -> db -> num_rows();
    }
}
