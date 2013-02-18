<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-31
 * Time: 下午9:26
 * To change this template use File | Settings | File Templates.
 */
class Table_m extends Core implements CRUD
{

    function table_m(){
        $prefix =Config::item('DB','PREFIX');
        $this -> tableName = $prefix.'table_config';
        $this -> tableNameField = $prefix.'table_field';
    }

    function lists($start, $pagecount)
    {
        // TODO: Implement lists() method.
        $tables = $this -> db -> query("select * from $this->tableName limit $start,$pagecount") -> result_array();
        return $tables;
    }

    function read($id)
    {
        // TODO: Implement read() method.
    }

    function insert($array)
    {
        // TODO: Implement insert() method.
    }

    function update($array, $condition)
    {
        // TODO: Implement update() method.
        return $this -> db -> update($this->tableName,$array,$condition);
    }

    function del($id)
    {
        // TODO: Implement del() method.
    }

    function num_rows()
    {
        // TODO: Implement num_rows() method.
        $this -> db -> query("select id from $this->tableName");
        return $this->db->num_rows();
    }

    function save_config($config){
        return $this -> db -> insert($this->tableName,$config);
    }

    function get_config($tableName){
        return $this -> db -> query("select * from $this->tableName where tableName = '$tableName'") -> row_array();
    }

    function del_config($tableName){
        return $this -> db -> query("delete from $this->tableName where tableName = '$tableName'") -> queryState;
    }

    function save_fields($fieldNames,$fieldTypes,$refer,$datasource,$condition,$formValidate,$searchable,$tableName){
        $total = count($fieldNames);
        $sql = "insert into $this->tableNameField (tableName,fieldName,fieldType,refer,datasource,cond,formValidate,searchable) values ";
        for($i =0 ; $i<$total ; $i++){
                $sql .= " ('$tableName','$fieldNames[$i]','$fieldTypes[$i]','$refer[$i]','$datasource[$i]','$condition[$i]','$formValidate[$i]',$searchable[$i]),";
        }
        $sql = substr($sql,0,strlen($sql) - 1);
        return $this -> db -> query($sql) -> queryState;
    }

    function save_field($array){
        return $this -> db -> insert($this->tableNameField,$array);
    }

    function update_field($array,$condition){
        return $this -> db -> update($this->tableNameField,$array,$condition);
    }

    function get_field($tableName){
        $result =  $this -> db -> query("select * from $this->tableNameField where tableName='$tableName'") -> result_array();
        $fields = array();
        foreach($result as $field){
            $fields[$field['fieldName']] = $field;
        }
        return $fields;
    }

    function del_field($tableName,$fieldName){
        return $this -> db -> query("delete  from $this->tableNameField where tableName='$tableName' and fieldName = '$fieldName'") -> queryState;
    }

    function del_all_field($tableName){
        return $this -> db -> query("delete  from $this->tableNameField where tableName='$tableName' ") -> queryState;
    }

}
