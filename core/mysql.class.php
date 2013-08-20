<?php

if( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Mysql extends  MysqlBase{


     /**
      * @param $sql
      * 查看一条sql语句的效率状况
      */
     public function explain($sql){
        $result = mysql_query('EXPLAIN '.$sql);
        if($row = mysql_fetch_assoc($result)){
            echo '<font color="red">';
            foreach($row as $k => $v){
                echo $k.' : '.$v.'<br/>';
            }
            echo '</font>';
        }
        unset($result);
        return $this;
    }

     /**
      * @return array
      * 查询该数据库所有的表名
      */
     public function show_tables(){
        $sql = "SHOW TABLES";
        $result = mysql_query($sql,$this->link);
        $tables = array();
        while($row = mysql_fetch_row($result)){
            $tables[] = $row[0];
        }
        return $tables;
    }


     /**
      * @param $tableName
      * @return resource
      * 快速清空一张表
      */
     public function emptyTable($tableName){
        $sql = "TRUNCATE $tableName";
        return mysql_query($sql,$this->link);
    }


     /**
      * @param $tableName
      * @param $id_key   主键的字段名
      * @param $id_value 主键的值
      * @return resource
      * 执行行锁: 只支持innodb 并且需要在事务中使用才能有效果
      * 如果 id_key 不是主键的话 那会产生表锁 而不是 行锁
      */
     public function lock_row($tableName,$id_key,$id_value){
       return mysql_query("SELECT $id_key FROM $tableName WHERE $id_key=$id_value FOR UPDATE ",$this->link);
    }

     public function lock_table_write($tableName){
         return mysql_query("LOCK TABLES $tableName WRITE",$this->link);
     }

     public function lock_table_read($tableName){
         return mysql_query("LOCK TABLES $tableName READ",$this->link);
     }

     public function unlock_tables(){
        return mysql_query("UNLOCK TABLES",$this->link);
     }

     /**
      * @param $tableName
      * @return array
      * 查询该表所有字段的详细信息 返回数组包括key:
      * Field | Type | Collation | Null | Key | Default | Extra | Privileges                      | Comment |
      */
     public function table_fields($tableName){
        return $this -> query("SHOW FULL FIELDS FROM $tableName")->result_array();
     }
 }

?>