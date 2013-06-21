<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-7
 * Time: 下午2:46
 * To change this template use File | Settings | File Templates.
 */
if( ! defined('BASEPATH')) exit('No direct script access allowed');
class News_m extends Core implements CRUD
{

    function News_m(){
        $prefix = Config::item('DB','PREFIX');
        $this -> table_article = $prefix.'article';
        $this -> table_content = $prefix.'articlebody';
        $this -> table_arctype = $prefix.'arctype';
     }

    function insert($array)
    {
        // TODO: Implement insert() method.
        $content = $array['content'];
        $array['pubdate'] = time();
        $array['publisher'] = $this -> cookie -> userdata('admin');
        $array['publisher_id'] = $this -> cookie -> userdata('admin_id');
        unset($array['content']);
        if($this -> db -> insert($this->table_article,$array)){
            $id = $this -> db -> insert_id();
            if($this -> db -> insert($this->table_content,array('aid'=>$id,'body'=>$content))){
                return TRUE;
            }
            $this -> del($id);
            return FALSE;
        }
        return FALSE;
    }

    function lists($start,$pagecount)
    {
        // TODO: Implement lists() method.
        $result = $this -> db -> query("select a.*,b.typename from $this->table_article a,$this->table_arctype b where a.typeid = b.id order by a.pubdate desc limit $start,$pagecount") -> result_array();
        return $result;
    }

    function update($array,$id)
    {
        // TODO: Implement update() method.
        $content = $array['content'];
        unset($array['content']);
        if($this -> db -> update($this->table_article,$array,"id=$id")){
            $id = $this -> db -> insert_id();
            if($this -> db -> update($this->table_content,array('body'=>$content),"aid=$id")){
                return TRUE;
            }
            $this -> del($id);
            return FALSE;
        }
        return FALSE;
    }

    function del($id)
    {
        // TODO: Implement del() method.
        $this -> db -> query("DELETE $this->table_article,$this->table_content from $this->table_article LEFT JOIN $this->table_content ON $this->table_article.id=$this->table_content.aid WHERE $this->table_article.id in ($id)");
        if($this -> db -> queryState){
            return TRUE;
        }
        return FALSE;
    }

    function num_rows(){
       return  $this -> db -> query("select id from $this->table_article") -> num_rows();
    }

    function read($id){
        return $this -> db -> query("select a.*,b.body from $this->table_article a,$this->table_content b where a.id = $id and a.id = b.aid") -> row_array();
    }

}
