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
}
