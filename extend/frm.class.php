<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-31
 * Time: 下午4:22
 * To change this template use File | Settings | File Templates.
 * 表结构类
 */
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frm
{

    function frm($db){
        $this -> db = $db;
    }

    /*
     * @return array 无key的数据库字段类型数组
     */
    public function field_types(){
         $engine =   Config::item('DB','ENGINE');//通过数据库的设置判断是哪个数据库 再读取数据库的字段类型
         $fields =   Config::item($engine.'_field');
         return $fields;
    }

    /**
     *
     * @return 表引擎
     */
    public function table_engine(){
        $engine =   Config::item('DB','ENGINE');//通过数据库的设置判断是哪个数据库
        $table_engine = Config::item($engine.'_engine');
        return $table_engine;
    }

    /**
     *
     * @return 表字符集
     */
    public function table_charset(){
        $engine =   Config::item('DB','ENGINE');//通过数据库的设置判断是哪个数据库
        $table_charset = Config::item($engine.'_table_charset');
        return $table_charset;
    }

    /*
     * 获取一张表的所有字段
     * @return array
     */
    public function fields($tableName){
          return $this -> db -> query("show full fields from $tableName")->result_array();
    }

    /**
     * 得到一张表的表信息 如引擎之类的
     * @return array();
     */
    public function table_info($tableName){
        return $this -> db -> query("show table status like '$tableName'") -> row_array();
    }

    /**
     * 给一张表添加一个或多个字段
     * @param $tableName 表名
     * @param $kv 示例array(array(name=>'title','type'=>'varchar(32)','comment'=>'标题字段')...)
     * @return true/false
     */
    public function addColumns($tableName,$kv){
           if(empty($tableName) OR empty($kv))return FALSE;

            $sql = "alter table $tableName add column ";
            foreach($kv as $column){
                list($columnName,$columnType,$comment,$default,$isnull) = $column;
                if(is_numeric($default)){
                    $sql .= "$columnName $columnType comment '$comment' $isnull default $default ,";
                }else if(!empty($default)){
                    $sql .= "$columnName $columnType comment '$comment' $isnull default '$default' ,";
                }else{
                    $sql .= "$columnName $columnType comment '$comment' $isnull ,";
                }
            }
            $sql = substr($sql,0,strlen($sql) - 1);
            return $this -> db -> query($sql) -> queryState;
    }

    /**
     * 删除一张表的多个字段或一个字段
     * @param $tableName 表名
     * @param $k 示例array('title')
     * @return true/false
     */
    public function delColumns($tableName,$k){
        if(empty($tableName) OR empty($k))return FALSE;

        $sql = "alter table $tableName drop column ";
        foreach($k as $columnName){
            $sql .= "$columnName,";
        }
        $sql = substr($sql,0,strlen($sql) - 1);
        return $this -> db -> query($sql) -> queryState;
    }

    /**
     * 修改一张表的一个或多个字段
     * @param $tableName 表名
     * @param $kv 示例array(array('from' => 'smalltitle','to' => 'bigtitle' ,'totype'=>'varchar(32)','tocomment'=>'大标题')...)
     * @return  true/false
     */
    public function alterColumns($tableName,$kv){
        if(empty($tableName) OR empty($kv))return FALSE;

        $sql = "alter table $tableName change ";
        foreach($kv as $column){
            list($from,$columnName,$columnType,$comment,$default,$isnull) = $column;

            if(is_numeric($default)){
                $sql .= " $from $columnName $columnType comment '$comment' $isnull default $default ,";
            }else if(!empty($default)){
                $sql .= " $from $columnName $columnType comment '$comment' $isnull default '$default' ,";
            }else{
                $sql .= " $from $columnName $columnType comment '$comment' $isnull ,";
            }
        }
        $sql = substr($sql,0,strlen($sql) - 1);

        return $this -> db -> query($sql) -> queryState;

    }


    /**
     * 生成一张表
     * @param $tableName
     * @param $table_engine
     * @param $table_charset
     * @param $autocreament
     * @param $columnNames Array  字段名称数组 下标为数字
     * @param $columnTypes Array  字段类型数组 下标为数字
     * @param $columnLengths Array 字段长度数组 下标为数字
     * @param $columnComments Array 字段描述数组
     * @param $column_default
     * @param $column_isnull
     * @param $isprimarykey 是否需要主键,如果为1 的话那么就默认数组中第一个字段为主键
     * @return true/false
     */
    public function create_table($tableName,$table_engine,$table_charset,$autocrement,$columnNames,$columnTypes,$columnLengths,$columnComments,$column_default,$column_isnull,$isprimarykey){
        if(empty($tableName) ||  empty($columnNames) || empty($columnTypes) || empty($columnLengths) || empty($columnComments))return FALSE;
        $column_total = count($columnNames);
        $sql = "create table $tableName(";
        for($i = 0;$i < $column_total ; $i++){

            if(empty($columnLengths[$i])){
                $sql .= "$columnNames[$i] $columnTypes[$i]  ";
            }else{
                $sql .= "$columnNames[$i] $columnTypes[$i]($columnLengths[$i]) ";
            }

            if(!empty($column_default[$i])){
                if(is_numeric($column_default[$i])){
                    $sql .= "default $column_default[$i]";
                }else{
                    $sql .= "default '$column_default[$i]'";
                }
            }

            if($i==0 && $isprimarykey){
                $sql .= "  primary key  $autocrement  comment '$columnComments[$i]' $column_isnull[$i] ,";
            }else{
                $sql .= "  comment '$columnComments[$i]' $column_isnull[$i] ,";
            }


        }
        $sql = substr($sql,0,strlen($sql) - 1);
        if(!empty($autocreament)){
            $sql.= ") ENGINE=$table_engine AUTO_INCREMENT=1";
        }else{
            $sql.= ") ENGINE=$table_engine";
        }

        $sql .= " DEFAULT CHARSET=$table_charset;";

        return $this -> db -> query($sql) -> queryState;
    }

    public function drop_table($tableName){
       return $this -> db -> query("drop table $tableName") -> queryState;
    }

    public function alter_table($tableName,$change){
        return $this -> db -> query("alter table $tableName $change") -> queryState;
    }


}
