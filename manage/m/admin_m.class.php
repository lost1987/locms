<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-7
 * Time: 下午5:24
 * To change this template use File | Settings | File Templates.
 */
class Admin_m extends Core implements CRUD
{

    function Admin_m(){
        $prefix = Config::item('DB','PREFIX');
        $this -> tableName = $prefix.'admin';
    }

    function lists($start, $pagecount)
    {
        // TODO: Implement lists() method.
        return $this -> db -> query("select * from $this->tableName where admin <> 'lost' limit $start,$pagecount")->result_array();
    }

    function lists_no_limit()
    {
        // TODO: Implement lists() method.
        return $this -> db -> query("select * from $this->tableName where admin <> 'lost'")->result_array();
    }

    function read($id)
    {
        // TODO: Implement read() method.
        return $this -> db -> query("select * from $this->tableName where id = $id") -> row_array();
    }

    function insert($array)
    {
        // TODO: Implement insert() method.
        if($this -> db -> insert($this->tableName,$array)){
            return TRUE;
        }
        return FALSE;
    }

    function update($array, $condition)
    {
        // TODO: Implement update() method.
        if($this -> db -> update($this->tableName,$array,$condition)){
            return TRUE;
        }
        return FALSE;
    }

    function del($id)
    {
        // TODO: Implement del() method.
        $this -> db -> query("delete from $this->tableName where id in ($id)");
        if($this -> db -> queryState){
            return TRUE;
        }
        return FALSE;
    }

    function num_rows()
    {
        // TODO: Implement num_rows() method.
        return $this -> db -> query("select id from $this->tableName") -> num_rows();
    }

}

?>