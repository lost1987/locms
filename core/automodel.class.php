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
    protected $condition;

    function lists($start,$pagecount){
        $table = $this->autoform->tableName;
        return $this -> db -> query("select * from $table $this->condition limit $start,$pagecount") -> result_array();
    }

    function read($id){
        $table = $this->autoform->tableName;
        return $this -> db -> query("select * from $table where id  = $id") -> row_array();
    }

    function insert($array){
        $table = $this->autoform->tableName;
        return $this -> db -> insert($table,$array);
    }

    function update($array,$condition){
        $table = $this->autoform->tableName;
        return $this -> db -> update($table,$array,$condition);
    }

    function del($id){
        $table = $this->autoform->tableName;
        return $this -> db -> query("delete from $table where id in ($id)") -> queryState;
    }

    function num_rows(){
        $table = $this->autoform->tableName;
        return $this -> db -> query("select id from $table $this->condition") -> num_rows();
    }

    function setCondition($array){

            $condition = '';

            foreach($array as $k => $v){

                if(empty($v['value']))continue;

                $columnName = $k;
                $columnValue = $v['value'];
                switch($v['form_field_type']){
                    case 'textfield': $condition.= " $columnName like '$columnValue%' and";break;
                    case 'combox' :
                                      if(is_numeric($columnValue))
                                        $condition .= " $columnName = $columnValue and";
                                      else
                                        $condition .= " $columnName = '$columnValue' and";
                                      break;
                    case 'radio' :
                                     if(is_numeric($columnValue))
                                        $condition .= " $columnName = $columnValue and";
                                     else
                                        $condition .= " $columnName = '$columnValue' and";
                                     break;
                    case 'checkbox':    $condition .= " locate($columnValue,$columnName) > 0 and";break;

                }

            }

            if(!empty($condition))$condition = 'where '.$condition;
            $condition = substr($condition,0,strlen($condition)-3);
            $this -> condition = $condition;
    }
}
